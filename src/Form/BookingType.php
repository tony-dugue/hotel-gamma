<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateStart',DateType::class, [
                'widget' => 'single_text',
                'label'    => false,
                'attr'  => ['class' => 'input-small form-control']
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text',
                'label'    => false,
                'attr'  => ['class' => 'input-small form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
