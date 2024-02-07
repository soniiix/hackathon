<?php

namespace App\Controller;

use App\Entity\Hackathon;
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

        //if ($this->isGranted('ROLE_USER') == false) {
          //  dump('connecté');
        //}



        //$this->denyAccessUnlessGranted('IS_AUTHENTICATED');

        if ($form->isSubmitted() && $form->isValid()) {
            $recherche = $form->getData()['titre'];
            dump($recherche);

            $lesHackathons = $repository->findBy(['titre' => $recherche], ['dateDebut' => 'DESC']);
            //dump($lesHackathons);
        }
        else {
            $lesHackathons = $repository->findBy([], ['dateDebut' => 'DESC']);
        }

        return $this->render('hackathon/index.html.twig', ['form' => $form->createView(), 'lesHackathons' => $lesHackathons]);
    }
}
