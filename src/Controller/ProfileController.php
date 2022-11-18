<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Company;
use App\Form\CompanyFormType;
use App\Repository\CompanyRepository;
use App\Repository\UserRepository;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="app_profile")
     */
    public function index(CompanyRepository $companyRepository, UserRepository $userRepository): Response
    {

        // $user = $userRepository;
        // $companiesUser = $user->getCompanies()->getValues();

        // dd($companiesUser);

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'votre page de profile',
            'company' => $companyRepository->findAll(),
            'user' => $userRepository->findAll(),

        ]);
        
    }

}
