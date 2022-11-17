<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Category;

use App\Entity\ShowCase;
use App\DataTransformer\CategoryTransformer;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ShowCaseType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],]
                )
            ->add('email')
            ->add('phoneNumber')
            ->add('categorys', CategoryType::class,[
                'data_class' => null
            ])        
            // ->add('company', EntityType::class, [
            //     'class' => User::class,
            //     'choices' => $showCase->getCompany(),
            // ]);
            // ->add('company', RepeatedType::class, [
            //     // 'class' => Company::class,
            //     'type' => User::class,
            //     'options' => ['label' => 'companies'],
            //     'required' => true,

            //     // 'choice_label' => 'name',
            // ])
            ->add('companyId')
            ->add('images', FileType::class, [
                // 'lable' => false,  //on enleve le lable pour ne pas marquer image mais ca ne marche pas
                'multiple' => true,
                'mapped' => false, // pour ne pas le lier a la bdd
                'required' => false, // pour le rendre obligatoire
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShowCase::class,
        ]);
    }
}
