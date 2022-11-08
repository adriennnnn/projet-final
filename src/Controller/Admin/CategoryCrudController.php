<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ShowCaseRepository;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
            yield TextField::new('name');

            yield SlugField::new('slug')
                ->setTargetFieldName('name');

    }

    // /**
    //  * @Route("/", name="app_category_index", methods={"GET"})
    //  */
    // public function index(CategoryRepository $CategoryRepository): Response
    // {
    //     // $id = $this->getUser();
    //     // $user = $userRepository->findOneBy(['id' => $id]);
    //     // $showcaseByUser = $user->getShowCases();


    //     return $this->render('show_case/index.html.twig', [
    //         'categories' => $CategoryRepository->findAll(),
    //         // 'categories' => $showcaseByUser,

    //     ]);
    // }
    
}
