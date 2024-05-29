<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Repository\HostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Host;
use App\Form\HostType;
use App\Service\UtilsService;

class HostController extends AbstractController
{
    private HostRepository $hostRepository;


    public function __construct(HostRepository $hostRepository) 
    {
        $this->hostRepository = $hostRepository;
    }



    #[Route('/voyage/{id}', name: 'app_host_add')]
    public function addHost(Request $request, EntityManagerInterface $manager, Hostrepository $hostRepository, Travel $travel): Response
    {
        //dd($travel);
        $msg = "";
        $host = new Host();
        $form = $this->createForm(HostType::class, $host);    
        $form->handleRequest($request);

        //Condition si le formulaire est soumis et si il est valide
        //Condition if form is submitted ans if it is valid
        if($form->isSubmitted() and $form->isValid()){
            $host->setName(UtilsService::cleaninput($host->getName()));
            $host->setAddress(UtilsService::cleaninput($host->getAddress()));
            $host->setRadio(UtilsService::cleaninput($host->getRadio()));
            
            //Si un numéro de téléphone à été ajouté
            //If number phone has been added
            if($host->getPhone()){
               $host->setPhone(UtilsService::cleaninput($host->getPhone())); 
            }
            //Si un prix à été ajouté
            //If a price has been added
            if($host->getPrice()){
               $host->setPrice(UtilsService::cleaninput($host->getPrice()));  
            }
            //Si une information compémentaire a été ajouté
            //If a additional information has been added
            if($host->getInfo()){
               $host->setInfo(UtilsService::cleaninput($host->getInfo()));   
             }

             //Lier le nouvel hébergement au voyage en cours
             //Link the new host to the current travel
            $host->setTravel($travel);
             
            if(!$hostRepository->findOneBy(['name' => $host->getName()])){
                $manager->persist($host);
                $manager->flush();

                $msg = "L'hébergement à bien été ajouté";

            } else {
                $msg = "Un hébergement avec le même nom est déjà enregistré";
            }
        }
        return $this->render('travel/travel_detail.html.twig', [
            'form' => $form->createView(),
            'msg' => $msg,
            'travel'=> $travel,
            'host' => $host,
        ]);
    }


    #[Route('/voyage/{id}', name: 'app_host_all')]
    public function hostAll(Travel $travel): Response
    {
        $hosts= $this->hostRepository->findAll();
        //$hosts= $this->hostRepository->findBy(['travel' => '{id}']);
        //dd($travel);

        return $this->render('host/host_all.html.twig', [
            'hosts' => $hosts,
            'travel'=> $travel,
            //'user' => $user,
        ]);
    }

}
