<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DiscussionsController extends AbstractController
{
    #[Route('/discussions', name: 'app_discussions')]
    public function index(): Response
    {
        return $this->render('discussions/index.html.twig', [
            'controller_name' => 'DiscussionsController',
        ]);
    }
}
