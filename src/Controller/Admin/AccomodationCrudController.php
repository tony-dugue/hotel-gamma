<?php

namespace App\Controller\Admin;

use App\Entity\Accomodation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AccomodationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Accomodation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('photo'),
            IntegerField::new('beds'),
            IntegerField::new('persons'),
            IntegerField::new('size'),
            IntegerField::new('price'),
            TextareaField::new('description'),
            AssociationField::new('type'),
            AssociationField::new('category'),
            AssociationField::new('amenities')
        ];
    }
}
