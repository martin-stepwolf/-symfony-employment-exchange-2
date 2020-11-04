<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add(
                'roles',
                ChoiceType::class,
                [
                    'choices' => [
                        'Administrator' => 'ROLE_ADMIN',
                        'Company' => 'ROLE_COMPANY',
                        'Applicant' => 'ROLE_APPLICANT',
                    ],
                    'multiple' => true,
                    'expanded' => true,
                ]
            )
            ->add('password');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
