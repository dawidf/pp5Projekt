<?php

namespace Extremism\CarRentalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction('https.dotpay.pl/test_payment/');
        $builder
            ->add('name')
            ->add('surname')
            ->add('phone')
            ->add('city')
            ->add('email')
            ->add('postcode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'extremism_car_rental_bundle_payment_type';
    }
}
