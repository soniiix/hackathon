<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Entity\InscriptionHackathon;
use App\Entity\Participant;
use App\Form\SearchType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HackathonController extends AbstractController
{
    #[Route('/hackathon', name: 'app_hackathon')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);

        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recherche = $form->getData()['titre'];
            dump($recherche);

            $lesHackathons = $repository->findBy(['titre' => $recherche], ['dateDebut' => 'DESC']);
            //dump($lesHackathons);
        } else {
            $lesHackathons = $repository->findBy([], ['dateDebut' => 'DESC']);
        }

        return $this->render('hackathon/index.html.twig', ['form' => $form->createView(), 'lesHackathons' => $lesHackathons]);
    }

    #[Route('/hackathon/{idHackathon}-{idParticipant}', name: 'app_inscription_hackathon')]
    public function inscription(ManagerRegistry $doctrine, $idHackathon, $idParticipant): Response
    {
        $inscription = new InscriptionHackathon();

        $hackathonRepository = $doctrine->getRepository(Hackathon::class);
        $participantRepository = $doctrine->getRepository(Participant::class);
        $inscriptionRepository = $doctrine->getRepository(InscriptionHackathon::class);

        $dateInscription = new \DateTime();
        $leHackathon = $hackathonRepository->find($idHackathon);
        $leParticipant = $participantRepository->find($idParticipant);

        //on cherche les inscriptions du participant
        $exist = false;
        $lesInscriptions = $inscriptionRepository->findBy(['leParticipant' => $leParticipant]);
        foreach($lesInscriptions as $uneInscription){
            if($uneInscription->getLeHackathon() == $leHackathon){
                $exist = true;
            }
        }

        //si le participant n'est pas déjà inscrit à cet hackathon
        if ($exist == false){
            $inscription->setDate($dateInscription);
            $inscription->setLeHackathon($leHackathon);
            $inscription->setLeParticipant($leParticipant);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();

            $this->addFlash('success', 'Inscription réussie !');
            return $this->redirectToRoute('app_hackathon');
        }
        elseif ($exist == true){
            $this->addFlash('failure', 'Vous êtes déjà inscrit à cet hackathon.');
        }
        
        return $this->redirectToRoute('app_hackathon');
    }
}
