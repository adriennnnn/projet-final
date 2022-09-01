<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\CompanyRepository;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/company")
 */
class CompanyController extends AbstractController
{

    /** 
     * @Route("/", name="app_company_index", methods={"GET"})
     */
    public function index(CompanyRepository $companyRepository, UserRepository $userRepository , Request $request): Response
    {
        // $company->setUserId($this->getUserId());
        // var_dump($this->getUserId());
        
        // $id = $request->getUser('id');
        $id = $this->getUser();
        $user = $userRepository->findOneBy(['id' => $id]);
        // dd($user);
        $companyByUser = $user->getCompanies();
        

        return $this->render('company/index.html.twig', [
            'companies' => $companyRepository->findAll(),
            // 'companies' => $companyRepository->findBy(array( 'id' => $company->getId())),
            'companies' => $companyByUser,

        ]);
        
    }

    /**
     * @Route("/new", name="app_company_new", methods={"GET", "POST"})  
     */
    public function new(Request $request, CompanyRepository $companyRepository): Response
    {

        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $company->setUserId($this->getUser());
            $companyRepository->add($company, true);
            
            return $this->redirectToRoute('app_company_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('company/new.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_company_show", methods={"GET"})
     */
    public function show(Company $company): Response
    {
        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_company_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Company $company, CompanyRepository $companyRepository): Response
    {
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $companyRepository->add($company, true);
            
            return $this->redirectToRoute('app_company_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('company/edit.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_company_delete", methods={"POST"})
     */
    public function delete(Request $request, Company $company, CompanyRepository $companyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            $companyRepository->remove($company, true);
        }
        
        return $this->redirectToRoute('app_company_index', [], Response::HTTP_SEE_OTHER);
    }
}



