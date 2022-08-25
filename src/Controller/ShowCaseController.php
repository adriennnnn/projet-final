<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Company;
use App\Repository\CompanyRepository;

use App\Entity\ShowCase;
use App\Form\ShowCaseType;
use App\Repository\ShowCaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/showcase")
 */
class ShowCaseController extends AbstractController
{
    /**
     * @Route("/", name="app_show_case_index", methods={"GET"})
     */
    public function index(ShowCaseRepository $showCaseRepository, CompanyRepository $companyRepository): Response
    {
        // $id = $this->getCompany();
        // $user = $companyRepository->findOneBy(['id' => $id]);
        // $companyByUser = $user->getCompanies();


        return $this->render('show_case/index.html.twig', [
            'show_cases' => $showCaseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_show_case_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ShowCaseRepository $showCaseRepository, CompanyRepository $companyRepository): Response
    {
        $showCase = new ShowCase();
        $form = $this->createForm(ShowCaseType::class, $showCase);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $showCase->setUserId($this->getUser());
            $showCaseRepository->add($showCase, true);

            return $this->redirectToRoute('app_show_case_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('show_case/new.html.twig', [
            'show_case' => $showCase,
            'company' => $companyRepository->findAll(),
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_show_case_show", methods={"GET"})
     */
    public function show(ShowCase $showCase): Response
    {
        return $this->render('show_case/show.html.twig', [
            'show_case' => $showCase,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_show_case_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ShowCase $showCase, ShowCaseRepository $showCaseRepository): Response
    {
        $form = $this->createForm(ShowCaseType::class, $showCase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $showCaseRepository->add($showCase, true);

            return $this->redirectToRoute('app_show_case_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('show_case/edit.html.twig', [
            'show_case' => $showCase,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_show_case_delete", methods={"POST"})
     */
    public function delete(Request $request, ShowCase $showCase, ShowCaseRepository $showCaseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$showCase->getId(), $request->request->get('_token'))) {
            $showCaseRepository->remove($showCase, true);
        }

        return $this->redirectToRoute('app_show_case_index', [], Response::HTTP_SEE_OTHER);
    }
}
