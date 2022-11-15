<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use App\Entity\Category;
use App\Entity\Media;
use App\Entity\User;
use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{


    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ArticlesCrudController::class)->generateurl();

        return $this->redirect($url);
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('LDSymfonyProject CMS');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        //if($this->isGranted('ROLE_AUTHOR')){
            yield MenuItem::subMenu('Articles', 'fas fa-newspaper')->setSubItems([
                MenuItem::linkToCrud('Tous les articles','fas fa-newspaper',Articles::class),
                MenuItem::linkToCrud('Ajouter','fas fa-plus',Articles::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Catégories','fas fa-list',Category::class)
            ]);

        yield MenuItem::subMenu('Médias', 'fas fa-photo-video')->setSubItems([
            MenuItem::linkToCrud('Médiatheque','fas fa-photo-video',Media::class),
            MenuItem::linkToCrud('Ajouter','fas fa-plus',Media::class)->setAction(Crud::PAGE_NEW),

        ]);

        yield MenuItem::linkToCrud('Vidéos', 'fas fa-video', Video::class)->setAction(Crud::PAGE_NEW);
        //}

        //if($this->isGranted('ROLE_ADMIN')){
            yield MenuItem::subMenu('Comptes', 'fas fa-user')->setSubItems([
                MenuItem::linkToCrud('Tous les comptes','fas fa-user-friends',User::class),
                MenuItem::linkToCrud('Ajouter','fas fa-plus',User::class)->setAction(Crud::PAGE_NEW),
            ]);
        //}

    }
}
