<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Company;
use App\Form\CompanyFormType;


class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="app_profile")
     */
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'votre page de profile',
        ]);
    }
    // /**
    //  * @Route("/company/new", name="app_create_company")
    //  */
    // public function createCompany(): Reponse
    // {
    //     $company = new Company();
        
    //     $form = $this->createForm(CompanyFormType::class, $company);

    //     return $this->renderForm('profile/form_company.html.twig', [
    //         'form' => $form,
    //         'controller_name' => 'Ajouter une societé'
    //     ]);
    // }
}