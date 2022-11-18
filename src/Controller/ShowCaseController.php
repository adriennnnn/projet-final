<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Company;
use App\Entity\ShowCase;
use App\Form\ShowCaseType;

use App\Entity\ImageShowCase;
use App\Repository\UserRepository;
use App\Repository\CompanyRepository;

use App\Repository\CategoryRepository;
use App\Repository\ShowCaseRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * @Route("/showcase")
 */
class ShowCaseController extends AbstractController
{
    /**
     * @Route("/", name="app_show_case_index", methods={"GET"})
     */
    public function index(ShowCaseRepository $showCaseRepository, UserRepository $userRepository): Response
    {
        $id = $this->getUser();
        $user = $userRepository->findOneBy(['id' => $id]);
        $showcaseByUser = $user->getShowCases();


        return $this->render('show_case/index.html.twig', [
            'show_cases' => $showCaseRepository->findAll(),
            'show_cases' => $showcaseByUser,

        ]);

    }

    /**
     * @Route("/new", name="app_show_case_new", methods={"GET", "POST"})
     */
    public function new(FormFactoryInterface $formFactory, Request $request, ShowCaseRepository $showCaseRepository, CompanyRepository $companyRepository, CategoryRepository $categoryRepository ): Response
    {
        /** @var \App\Entity\User $user */
        //pour appl les user 
        $user = $this->getUser();

        $companiesUser = $user->getCompanies()->getValues();
        // dd($companiesUser);
        $showCase = new ShowCase();

        $form = $this->createForm(ShowCaseType::class, $showCase);

        $form->handleRequest($request);

        //triste ca ne marche pas avec le simplie getcompanie dans l'entity user 
        // $companiesUser = $user->getCompanies()
        // $form = $formFactory->createNamed('my_name', ShowCaseType::class, $companiesUser);
        // $form->handleRequest($request);
        // dd($companiesUser);
        // $companiesUser =  $companyRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            
            
            //On recupère les images transmises 
            $images = $form->get('images')->getData();
            // on bouclz les images
            foreach($images as $image){
                //pour changer le nom des ficher et eviter les doublpn
                $ficher = md5(uniqid()) . '.' . $image->guessExtension();
                //Pui on copier le ficher dans uploads de public(dossier)
                $image->move(
                    $this->getParameter('images_path'),
                    $ficher
                );
                //on enregistre le nom de l'img dans la bdd
                $img = new ImageShowCase();
                $img->setImage($ficher);
                $showCase->addImageShowCase($img);

            }

            $showCase->setUserId($user);
            


            $showCaseRepository->add($showCase, true);

            return $this->redirectToRoute('app_show_case_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('show_case/new.html.twig', [
            'show_case' => $showCase,
            'companyId' => $companiesUser,
            'form' => $form,
            'categories' => $categoryRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}", name="app_show_case_show", methods={"GET"})
     */
    public function show(ShowCase $showCase, CategoryRepository $categoryRepository): Response
    {
        // dd($showCase->userId);
        //err getUserId ne donne pas l'id mais l'user en entier
        $user =$showCase->getUserId();
        $user_id = $user->getId();



        return $this->render('show_case/show.html.twig', [
            'show_case' => $showCase,
            'user_id' => $user_id,
            'categories' => $showCase->getcategorys(),
        ]);
    }
    // /**
    //  * @Route("/{id}", name="app_show_case_show", methods={"GET"})
    //  */
    // public function showPublic(ShowCase $showCase): Response
    // {
    //     return $this->render('index/show-show_case.html.twig', [
    //         'show_case' => $showCase,
    //     ]);
    // }

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
