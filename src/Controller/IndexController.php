<?php

namespace App\Controller;

use App\Entity\ShowCase;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use App\Repository\ShowCaseRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(ShowCaseRepository $showCaseRepository, CategoryRepository $categoryRepositoru): Response
    {
        // $id = $this->getUser();
        // $user = $userRepository->findOneBy(['id' => $id]);
        // $showcaseByUser = $user->getShowCases();
    
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            // penser a ajouter les render pour pouvoir afficher les info des company et showcase
            'show_cases' => $showCaseRepository->findAll(),
            'categories' => $categoryRepositoru->findAll()
            // 'show_cases' => $showcaseByUser,

        ]);
        // return $this->render('show_case/index.html.twig', [
    
        // ]);
    }

    

}
