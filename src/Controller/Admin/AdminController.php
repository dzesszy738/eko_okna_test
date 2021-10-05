<?php

namespace App\Controller\Admin;

use App\Entity\Formularz;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Eko Okna Test');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Powrót do strony głównej', 'fas fa-home', 'main');
        yield MenuItem::linkToCrud('Formularz', 'fas fa-list', Formularz::class);
        
    }

    

    
}
