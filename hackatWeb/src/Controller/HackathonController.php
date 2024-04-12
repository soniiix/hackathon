<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Entity\Hackathon;
use App\Entity\InscriptionHackathon;
use App\Entity\Participant;
use App\Form\SearchType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HackathonController extends AbstractController
{
    //======== Route pour voir tous les hackathons ========
    #[Route('/hackathons', name: 'app_hackathon')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $hackathonRepository = $doctrine->getRepository(Hackathon::class);
        $favoriRepository = $doctrine->getRepository(Favori::class);
        
        $lesFavoris = $favoriRepository->findAll();
        $lesHackathons = $hackathonRepository->findBy([], ['dateDebut' => 'DESC']);

        return $this->render('hackathon/index.html.twig', ['lesHackathons' => $lesHackathons, 'lesFavoris' => $lesFavoris]);
    }
    

    //======== Route d'API pour créer un favori ========
    #[Route('/favoris/hackathons/{idHackathon}/participants/{idParticipant}', name: 'app_newfavorite')]
    public function getFavoris(ManagerRegistry $doctrine, $idHackathon, $idParticipant)
    {
        $hackathonRepository = $doctrine->getRepository(Hackathon::class);
        $participantRepository = $doctrine->getRepository(Participant::class);
        $favoriRepository = $doctrine->getRepository(Favori::class);

        //récupération des objets
        $leHackathon = $hackathonRepository->find($idHackathon);
        $leParticipant = $participantRepository->find($idParticipant);

        //on vérifie si le favori existe déjà...
        $leFavori = $favoriRepository->findBy(['leParticipant' => $leParticipant, 'leHackathon' => $leHackathon]);

        //...si ce n'est pas le cas
        if($leFavori == []){
            //création d'un nouveau favori correspondant
            $newFavori = new Favori();
            $newFavori->setLeHackathon($leHackathon);
            $newFavori->setLeParticipant($leParticipant);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($newFavori);
            $entityManager->flush();

            $data = [
                'idHackathon' => $newFavori->getLeHackathon()->getId(),
                'idParticipant' => $newFavori->getLeParticipant()->getId()
            ];
            return new JsonResponse($data);
        }
        //...si c'est le cas, on renvoie une erreur
        else{
            return new JsonResponse(null, 404);
        }
    }


    //======== Route pour voir les hackathons du participant connecté ========
    #[Route('/meshackathons/{idParticipant}', name: 'app_meshackathons')]
    public function meshackathons(ManagerRegistry $doctrine, Request $request, $idParticipant): Response
    {
        $hackathonRepository = $doctrine->getRepository(Hackathon::class);
        $participantRepository = $doctrine->getRepository(Participant::class);
        $inscriptionRepository = $doctrine->getRepository(InscriptionHackathon::class);

        $leParticipant = $participantRepository->find($idParticipant);

        $lesInscriptions = $inscriptionRepository->findBy(['leParticipant' => $leParticipant]);

        return $this->render('meshackathons/index.html.twig', ['lesInscriptions' => $lesInscriptions]);
    }


    //======== Route permettant l'inscription à un hackathon ========
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
