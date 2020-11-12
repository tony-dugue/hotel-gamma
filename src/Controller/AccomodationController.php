<?php

namespace App\Controller;

use App\Entity\Accomodation;
use App\Entity\Booking;
use App\Form\BookingType;
use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param Accomodation $accomodation
     * @return Response
     */
    public function show(Request $request, Accomodation $accomodation): Response
    {
        // ====== AFFICHAGE FORMULAIRE DE RECHERCHE ========

        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getUser();  // on récupère l'utilisateur connecté

            $booking->setUser($user);  // on enregistre l'utilisateur
            $booking->setAccomodation($accomodation);  // on enregistre le logement

            // on enregistre la réservation en bdd
            $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();

            $this->addFlash('success', 'Votre réservation a bien été enregistrée');

            return $this->redirectToRoute('booking_show', [
                'id' => $booking->getId()
            ]);
        }

        return $this->render('accomodation/show.html.twig', [
            'acc' => $accomodation,
            "bookingForm" => $form->createView()  // on envoi le formulaire à la vue
        ]);
    }
}



