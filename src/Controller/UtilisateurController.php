<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\UtilisateurType;
use App\Form\ConnectionType;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Service\UtilisateurService;
use App\Service\UtilsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends AbstractController
{
    public function __construct(private UtilisateurService $cs){
        $this->cs = $cs;
    }
    #[Route('/', name: 'app_utilisateur_add')]
    public function addUtilisateur(Request $request, UtilisateurService $us, UtilisateurRepository $ur): Response{

        $msg = "";
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);
        $formCo = $this->createForm(ConnectionType::class, $utilisateur);
        $formCo->handleRequest($request);
        //$verifyEmail=$ur->findOneBy(['email' => $utilisateur->getEmail()]);

        //Verifier si le formulaire est soumis
        if($form->isSubmitted()){

             //nettoyer les entrées
             $utilisateur->setLastName(UtilsService::cleanInput($utilisateur->getLastName()));
             $utilisateur->setFirstName(UtilsService::cleanInput($utilisateur->getFirstName()));
             $utilisateur->setEmail(UtilsService::cleanInput($utilisateur->getEmail()));
             $utilisateur->setPwd(UtilsService::cleanInput(md5($utilisateur->getPwd())));
             //tester si le champ est complété
            //  if($utilisateur->getUrlImg()) {
            //      $utilisateur->setUrlImg(UtilsService::cleanInput($utilisateur->getUrlImg()));
            //  }
             if($us->create($utilisateur)){
                $msg = "Votre inscription est validé ! Connectez-vous !";
            }else {
                $msg = "L'utilisateur existe déjà !";
            }

            // //Verifier si le compte n'existe pas deja avec l'email
            // if(!$verifyEmail){

            //     $utilisateur->setPassword(md5($utilisateur->getPassword()));

            //     $em->persist($utilisateur);
            //     $em->flush();

            //     $msg = "L'utilisateur a bien été ajoutée en BDD";

            // }else {
            //     $msg = "Les informations sont incorrectes !";
            // }
        } else if ($formCo->isSubmitted()) {
            //nettoyer les entrées
            $utilisateur->setEmail(UtilsService::cleanInput($utilisateur->getEmail()));
            $utilisateur->setPwd(UtilsService::cleanInput(md5($utilisateur->getPwd())));
            
            if($ur->findOneBy(['email' => $utilisateur->getEmail(), 'pwd' => $utilisateur->getPwd()])){

                return $this->redirectToRoute('app_compte');
            }else {
                $msg = "Les informations sont incorrects.";
            }
        }
        return $this->render('accueil/index.html.twig', [
            'form' => $form->createView(), 
            'formco' => $formCo->createView(),
            'msg' => $msg,
        ]);
    }

    // #[Route('/', name: 'app_utilisateur_connect')]
    // public function connectUser(Request $request, UtilisateurRepository $ur): Response {

    //     $msg = "";
    //     $utilisateur = new Utilisateur();
    //     $form = $this->createForm(UtilisateurType::class, $utilisateur);
    //     $form->handleRequest($request);

    //     //Verifier si le formulaire est soumis
    //     if($form->isSubmitted()){

    //         //nettoyer les entrées
    //         $utilisateur->setEmail(UtilsService::cleanInput($utilisateur->getEmail()));
    //         $utilisateur->setPwd(UtilsService::cleanInput($utilisateur->getPwd()));

    //         if($ur->findOneBy(['email' => $utilisateur->getEmail()])){
    //             return $this->redirectToRoute('app_compte');
    //         }else {
    //            $msg = "L'utilisateur n'existe pas.";
    //         }

    //     }
    //     return $this->render('accueil/index.html.twig', [
    //         'formco' => $form->createView(), 
    //         'msg' => $msg,
    //     ]);
    // }

    #[Route('/informations', name: 'app_infos')]
    public function index(): Response
    {
        return $this->render('utilisateur/infos.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}