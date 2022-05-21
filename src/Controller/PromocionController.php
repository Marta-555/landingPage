<?php

namespace App\Controller;

use App\Form\ContactoType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PromocionController extends AbstractController
{
    #[Route('/promocion', name: 'app_promocion')]
    public function index(): Response
    {
        $form = $this->createForm(ContactoType::class);

        return $this->render('promocion/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
