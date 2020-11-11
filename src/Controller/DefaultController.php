<?php

namespace App\Controller;

use App\Entity\AccomodationSearch;
use App\Form\AccomodationSearchType;
use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET|POST"})
     * @param Request $request
     * @param AccomodationRepository $accRepo
     * @return Response
     */
    public function index(Request $request, AccomodationRepository $accRepo): Response
    {
        // ====== AFFICHAGE FORMULAIRE DE RECHERCHE ========

        $form = $this->createForm(AccomodationSearchType::class);
        $form->handleRequest($request);  // vérifie les données du formulaire

        // on récupère en base de données tous les logements et les catégories
        $accomodations = $accRepo->findAllAccomodations();

        // ====== TRAITEMENT DU FORMULAIRE DE RECHERCHE ========

        if ($form->isSubmitted() && $form->isValid()) {

            $type = $form->getData()->getType();
            $minPrice = $form->getData()->getPriceMin();
            $maxPrice = $form->getData()->getPriceMax();

            // Récupère les données du formulaire et lance la requête
            $accomodations = $accRepo->findSearchAccomodation($type, $minPrice, $maxPrice);
        }

        return $this->render('default/index.html.twig', [
            "accomodations" => $accomodations,
            "searchForm" => $form->createView(),  // on envoi le formulaire à la vue
        ]);
    }

}
