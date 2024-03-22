<?php

namespace App\Controller;

use App\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InscriptionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    //======== Route pour enregistrer une nouvelle inscription ========
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        //création d'un objet participant et d'un form
        $participant = new Participant();
        $form=$this->createForm(InscriptionType::class, $participant);
        $form->handleRequest($request);
        $formInscription = $form->createView();

        if ($form->isSubmitted() and $form->isValid()){
            $entityManager = $doctrine->getManager();
            $entityManager->persist($participant);

            $mdpHash = password_hash($participant->getMdp(), PASSWORD_BCRYPT);
            $participant->setMdp($mdpHash);

            $entityManager->flush();

            $this->addFlash('success', 'Votre compte a bien été créé. Veuillez vous connecter ci-dessous');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('inscription/index.html.twig', ['form' => $formInscription]);
    }
}
