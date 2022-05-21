<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromocionController extends AbstractController
{
    #[Route('/promocion', name: 'app_promocion')]
    public function index(): Response
    {
        return $this->render('promocion/index.html.twig', [
            'controller_name' => 'PromocionController',
        ]);
    }
}
