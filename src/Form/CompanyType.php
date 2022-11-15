<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName')
            ->add('siretNumber')
            ->add('companyDescription', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],]
                )
            // ->add('userId'
            // ,['attr' => ['empty_data' => '{{app.user.id}}']]
            //  )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
