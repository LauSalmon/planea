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


    #[Route('/voyage/{id}', name: 'app_host_add')]
    public function addHost(Request $request, EntityManagerInterface $manager, Hostrepository $hostRepository, Travel $travel): Response
    {
        //dd($travel);
        $msg = "";
        $host = new Host();
        $form = $this->createForm(HostType::class, $host);    
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $host->setName(UtilsService::cleaninput($host->getName()));
            $host->setAddress(UtilsService::cleaninput($host->getAddress()));
            $host->setRadio(UtilsService::cleaninput($host->getRadio()));
            
            if($host->getPhone()){
               $host->setPhone(UtilsService::cleaninput($host->getPhone())); 
            }
            if($host->getPrice()){
               $host->setPrice(UtilsService::cleaninput($host->getPrice()));  
            }
            if($host->getInfo()){
               $host->setInfo(UtilsService::cleaninput($host->getInfo()));   
             }

             
            if(!$hostRepository->findOneBy(['name' => $host->getName()])){
                $manager->persist($host);
                $manager->flush();

                $msg = "L'hébergement à bien été enregistré";

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

}
