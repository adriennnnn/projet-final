<?php

namespace App\Form;

use App\Entity\ShowCase;
use App\Entity\Company;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShowCaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            // ->add('companyId' )
            ->add('company', EntityType::class, [
                'class' => User::class,
                'choices' => $showCase->getCompany(),
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShowCase::class,
        ]);
    }
}
