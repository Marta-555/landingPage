<?php

namespace App\Form;

use App\Entity\Contacto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('email', EmailType::class)
            ->add('telefono', TelType::class, [
                'required' => false,
                'attr' => ['maxlength' => 9],
                'attr' => ['pattern' => '^[6|7|9]\\d{8}$'],
            ])
            ->add('preferenciaLlamada', ChoiceType::class, [
                'required' => false,
                'choices'  => [
                    'Elige una opción' => '',
                    'Mañana' => 'Mañana',
                    'Tarde' => 'Tarde',
                    'Noche' => 'Noche',
                ],
            ])
            ->add('tipoVehiculo', ChoiceType::class, [
                'choices'  => [
                    'Elige una opción' => '',
                    'Turismo' => 'Turismo',
                    'Todoterreno' => 'Todoterreno',
                    'Comercial' => 'Comercial',
                ],
            ])
            ->add('vehiculo', ChoiceType::class, [
                'choices'  => [
                    'Elige una opción' => '',
                    'Astra' => 'Astra',
                    'Corsa' => 'Corsa',
                    'Mokka' => 'Mokka',
                ],
            ])
            ->add('enviar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
