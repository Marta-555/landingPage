<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Form\ContactoType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PromocionController extends AbstractController
{
    #[Route('/promocion', name: 'app_promocion')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $contact = new Contacto();
        $form = $this->createForm(ContactoType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $doctrine->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();


        }

        return $this->render('promocion/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
