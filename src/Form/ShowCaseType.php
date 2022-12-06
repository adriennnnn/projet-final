<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Category;

use App\Entity\ShowCase;
use App\DataTransformer\CategoryTransformer;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Security\Core\Security;

class ShowCaseType extends AbstractType
{

    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
                'required' => true,
                ]
            )
            ->add('email', EmailType::class, [
                'required' => true,

            ])
            ->add('phoneNumber', TextType::class,[
                'required' => true,
                'attr' => ['maxlength' => 15],
            ])
            ->add('address', TextType::class,[
                'required' => true,
            ])
            ->add('categorys', CategoryType::class,[
                'data_class' => null,
                'required' => true,
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
            ->add('companyId', EntityType::class, [
                'class' => Company::class,
                'query_builder' => function (EntityRepository $er) {
                    //constructeur de requete SQL de doctrine
                    return $er->createQueryBuilder('c')
                        ->andWhere('c.userId = :user')
                        ->setParameter('user', $this->security->getUser());
                },
                'required' => true,

            ]
            )   
            ->add('images', FileType::class, [
                // 'lable' => false,  //on enleve le lable pour ne pas marquer image mais ca ne marche pas
                'multiple' => true,
                'mapped' => false, // pour ne pas le lier a la bdd
                'required' => true, // pour le rendre obligatoire
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

