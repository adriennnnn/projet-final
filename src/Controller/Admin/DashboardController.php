<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Category;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

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
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

        yield MenuItem::subMenu('categorie', 'fas fa-list')->setSubItems([
            MenuItem::LinkToCrud('Toute les categorie', 'fas fa-list',  Category::class),
            MenuItem::LinkToCrud('Ajouter', 'fas fa-plus',  Category::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', User::class);
        // yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list')->setSubItems([
        //     MenuItem::LinkToCrud('Toute les utilisateurs', 'fas fa-list',  User::class),
        //     MenuItem::LinkToCrud('Ajouter un utilisateur', 'fas fa-plus',  User::class)->setAction(Crud::PAGE_NEW)
        // ]);


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

    }
}
