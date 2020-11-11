<?php

namespace App\Controller;

use App\Entity\Accomodation;
use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccomodationController extends AbstractController
{
    /**
     * @Route("/accomodation/", name="accomodation_showAll")
     * @param AccomodationRepository $accRepo
     * @return Response
     */
    public function showAll(AccomodationRepository $accRepo): Response
    {

        // on récupère séparément les chambres et les appartements
        $accomodationRooms = $accRepo->findAllRooms();
        $accomodationApartments = $accRepo->findAllApartments();

        return $this->render('accomodation/showAll.html.twig', [
            'accomodationRooms' => $accomodationRooms,
            'accomodationApt' => $accomodationApartments
        ]);
    }

    /**
     * @Route("/accomodation/{id}", name="accomodation_show")
     * @param Accomodation $accomodation
     * @return Response
     */
    public function show(Accomodation $accomodation): Response
    {
        return $this->render('accomodation/show.html.twig', [
            'acc' => $accomodation
        ]);
    }
}

