<?php

 namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Articles;
use App\Entity\Categorie;
use App\Entity\Discussions;
use App\Entity\Forum;
use App\Entity\Messages;
use App\Entity\Commentaires;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;









class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('HelloEve- Adminisatration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Articles', 'fa-solid fa-font', Articles::class);
        yield MenuItem::linkToCrud('Categories', 'fa-solid fa-books', Categorie::class);
        yield MenuItem::linkToCrud('Discussions', 'fa-solid fa-ear-listen', Discussions::class);
        yield MenuItem::linkToCrud('Forums', 'fa-solid fa-peopele-roof', Forum::class);
        yield MenuItem::linkToCrud('Messages', 'fa-solid fa-comments', Messages::class);
        yield MenuItem::linkToCrud('Commentaires', 'fa-solid fa-comment', Commentaires::class);
    }
 }
