<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HackathonController extends AbstractController
{
    #[Route('/hackathon', name: 'app_hackathon')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $lesHackathons = $repository->findBy([], ['dateDebut' => 'ASC']);

        return $this->render('hackathon/index.html.twig', ['lesHackathons' => $lesHackathons]);
    }
}
