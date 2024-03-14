<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DiscutionsController extends AbstractController
{
    #[Route('/discutions', name: 'app_discutions')]
    public function index(): Response
    {
        return $this->render('discutions/index.html.twig', [
            'controller_name' => 'DiscutionsController',
        ]);
    }
}
