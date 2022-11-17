<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName')
            ->add('siretNumber'
            // , TypeTextType::class, array(
                //pour ajouter une limite de a la longeur du txt
            // 'attr' => ['pattern' => '/^[0-9]{8}$/', 'maxlength' => 8])
            )
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
