<?php

namespace App\Controller\Admin;

use App\Entity\Accomodation;
use App\Entity\Amenity;
use App\Entity\Booking;
use App\Entity\Category;
use App\Entity\Photo;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hotel Gamma');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Les chambres', 'fa fa-home', Accomodation::class);
        yield MenuItem::linkToCrud('Les équipements', 'fa fa-home', Amenity::class);
        yield MenuItem::linkToCrud('Les photos', 'fa fa-home', Photo::class);
        yield MenuItem::linkToCrud('Les types', 'fa fa-home', Type::class);
        yield MenuItem::linkToCrud('Les catégories', 'fa fa-home', Category::class);
        yield MenuItem::linkToCrud('Les utilisateurs', 'fa fa-home', User::class);
        yield MenuItem::linkToCrud('Les réservations', 'fa fa-home', Booking::class);
    }
}
