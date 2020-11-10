<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @param AccomodationRepository $accomodationRepository
     * @return Response
     */
    public function index(AccomodationRepository $accomodationRepository): Response
    {
        // on récupère en base de données tous les logements
        $accomodations = $accomodationRepository->findAll();

        return $this->render('default/index.html.twig', ["accomodations" => $accomodations]);
    }
}

