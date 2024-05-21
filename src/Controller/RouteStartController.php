<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Form\TravelStartType;
use App\Repository\RouteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\UtilsService;
use App\Entity\Routes;


class RouteStartController extends AbstractController
{
    private RouteRepository $routeRepository;

    public function __construct(RouteRepository $routeRepository){
        $this->routeRepository = $routeRepository;
    }

    #[Route('/voyage/{id}', name: 'app_route_start')]
    public function routeStartAdd(Request $request, EntityManagerInterface $manager, Routerepository $routeRepository, Travel $travel): Response{

        $msg = "";
        $route = new Routes();
        $form = $this->createForm(TravelStartType::class, $route);    
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $route->setPlaceStart(UtilsService::cleaninput($route->getPlaceStart()));
            $route->setPlaceEnd(UtilsService::cleaninput($route->getPlaceEnd()));
            $route->setDateStart(new \DateTimeImmutable(UtilsService::cleanInput($form->getData()->getDateStart()->format('d-m-Y'))));
            $route->setDateEnd(new \DateTimeImmutable(UtilsService::cleanInput($form->getData()->getDateEnd()->format('d-m-Y'))));
            $route->setTimeStart(new \DateTimeImmutable(UtilsService::cleanInput($form->getData()->getTimeStart()->format('H:M'))));
            $route->setTimeEnd(new \DateTimeImmutable(UtilsService::cleanInput($form->getData()->getTimeEnd()->format('H:M'))));

            $manager->persist($route);
            $manager->flush();


        } else {
            $msg = "Le formulaire est incomplet.";
        }
        return $this->render('travel/travel_detail.html.twig', [
            'form' => $form->createView(),
            'msg' => $msg,
            'travel'=> $travel,
        ]);            
    }

}

