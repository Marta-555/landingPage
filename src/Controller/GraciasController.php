<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GraciasController extends AbstractController
{
    #[Route('/gracias-promocion', name: 'gracias')]
    public function index(): Response
    {
        return $this->render('gracias/index.html.twig');
    }
}
