<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TravelRepository;
use App\Repository\UtilisateurRepository;
use App\Entity\Travel;
use App\Form\TravelType;
use App\Service\UtilsService;

class TravelController extends AbstractController{

    private TravelRepository $travelRepository;
    private UtilisateurRepository $utilisateurRepository;

    public function __construct(TravelRepository $travelRepository){
        $this->travelRepository = $travelRepository;
    }

    #[Route('/nouveau-voyage', name: 'app_new_travel')]
    public function newTravel(Request $request, EntityManagerInterface $manager, Travelrepository $travelRepository): Response{

        $msg = "";
        $travel = new Travel();
        $form = $this->createForm(TravelType::class, $travel);    
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $travel->setName(UtilsService::cleaninput($travel->getName()));
            $travel->setNbPassenger(UtilsService::cleaninput($travel->getNbPassenger()));
            $travel->setCountry(UtilsService::cleaninput($travel->getCountry()));
            $travel->setDateStart(new \DateTimeImmutable(UtilsService::cleanInput($form->getData()->getDateStart()->format('d-m-Y'))));
            $travel->setDateEnd(new \DateTimeImmutable(UtilsService::cleanInput($form->getData()->getDateEnd()->format('d-m-Y'))));

            if(!$travelRepository->findOneBy(['name' => $travel->getName()])){
                $manager->persist($travel);
                $manager->flush();

                return $this->redirectToRoute('app_compte');


            } else {
                 $msg = "Un voyage avec le même nom est déjà enregistré.";
            }
        }

        return $this->render('travel/index.html.twig', [
            'form' => $form->createView(),
            'msg' => $msg,
        ]);
    }

    #[Route('/mon-compte', name: 'app_compte')]
    public function travelAll(): Response
    {
        $travels= $this->travelRepository->findAll();
        //$user= $this->utilisateurRepository->find($id);

        return $this->render('travel/travel_all.html.twig', [
            'travels' => $travels,
            //'user' => $user,
        ]);
    }

    #[Route('/voyage/{id}',name:'app_travel', methods:'GET')]
    public function travelById($id) : Response {

        $travel = $this->travelRepository->findOneBy(['id' => $id]);

        return $this->render('travel/travel_detail.html.twig', [
            'travel'=> $travel,
        ]);
    }

    
}
