<?php

namespace App\Form;

use App\Entity\AccomodationSearch;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccomodationSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', EntityType::class, ['class' => Type::class])
            ->add('priceMin', IntegerType::class, [
                'required' => false,
                'label'    => false,
                'attr'     => ['placeholder' => 'Prix min']
            ])
            ->add('priceMax', IntegerType::class, [
                'required' => false,
                'label'    => false,
                'attr'     => ['placeholder' => 'Prix max']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => AccomodationSearch::class,
            'method'          => 'get',  // on met en get (sinon post par défaut))
            'csrf_protection' => false  // on désactive car pas besoin de token pour faire la recherche
        ]);
    }

    // modifier les préfixes dans l'url pour avoir des url plus propres
    public function getBlockPrefix()
    {
        return '';
    }
}
