<?php

namespace App\Controller;

use App\Form\AccomodationSearchType;
use App\Repository\AccomodationRepository;
use App\Repository\BookingRepository;
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
     * @param BookingRepository $bookingRepo
     * @return Response
     */
    public function index(Request $request, AccomodationRepository $accRepo, BookingRepository $bookingRepo): Response
    {
        // initialisation des données du formulaire
        $minPrice = 0;
        $maxPrice = 200;

        // ====== AFFICHAGE FORMULAIRE DE RECHERCHE ========

        $form = $this->createForm(AccomodationSearchType::class);
        $form->handleRequest($request);  // vérifie les données du formulaire

        // on récupère en base de données tous les logements
        $accomodations = $accRepo->findAllAccomodations();

        // On récupère en base de données les 3 id logements les plus réservés
        $limit = 3;
        $bestAccommodations = $bookingRepo->findBestAccommodations($limit);

        // ====== TRAITEMENT DU FORMULAIRE DE RECHERCHE ========

        if ($form->isSubmitted() && $form->isValid()) {

            $type = $form->getData()->getType();
            $minPrice = $form->getData()->getPriceMin();
            $maxPrice = $form->getData()->getPriceMax();

            // Récupère les données du formulaire et récupère les logements suivant condition
            $accomodations = $accRepo->findSearchAccomodation($type, $minPrice, $maxPrice);
        }

        return $this->render('default/index.html.twig', [
            "accomodations" => $accomodations,
            "bestAccomodations" => $bestAccommodations,
            "searchForm" => $form->createView(),  // on envoi le formulaire à la vue
            "minPrice" => $minPrice,
            "maxPrice" => $maxPrice
        ]);
    }

}
