<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Category;
use App\Entity\ShowCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // $url = $this->adminUrlGenerator
        //     ->setController(UserCrudController::class)
        //     ->generateUrl();
        //     return $this->redirect($url);
        return parent::index();
    }




    

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin GM');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield  MenuItem::linkToRoute('quitter l\'admin', 'fa-solid fa-right-to-bracket mr-2 fa-beat-fade', 'app_homepage');

        yield MenuItem::subMenu('Categorie', 'fas fa-list')->setSubItems([
            MenuItem::LinkToCrud('Toute les categorie', 'fas fa-list',  Category::class),
            MenuItem::LinkToCrud('Ajouter', 'fas fa-plus',  Category::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Vitrine', 'fas fa-list')->setSubItems([
            MenuItem::LinkToCrud('Toute les Vitrine', 'fas fa-list',  ShowCase::class),
            MenuItem::LinkToCrud('Ajouter', 'fas fa-plus',  ShowCase::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', User::class);

        // yield MenuItem::linkToCrud('Tableau de bord', 'fa fa-list', ShowCase::class );
            
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

    }
}
