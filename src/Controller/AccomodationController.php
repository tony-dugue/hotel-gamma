<?php

namespace App\Controller;

use App\Entity\Accomodation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccomodationController extends AbstractController
{
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

