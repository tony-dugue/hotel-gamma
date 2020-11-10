<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @param AccomodationRepository $accRepo
     * @param CategoryRepository $catRepo
     * @return Response
     */
    public function index(AccomodationRepository $accRepo, CategoryRepository $catRepo): Response
    {
        // on récupère en base de données tous les logements
        $accomodations = $accRepo->findAllAccomodations();
        $categories = $catRepo->findAll();

        return $this->render('default/index.html.twig', [
            "accomodations" => $accomodations,
            "categories" => $categories
        ]);
    }
}

