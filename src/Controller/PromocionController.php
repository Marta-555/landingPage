<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Contacto;
use App\Form\ContactoType;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Mime\Email;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\BodyRenderer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

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

            try {
                $email = (new Email())
                    ->from('mrtgarciaortega@gmail.com')
                    ->to(new Address('mrtgarciaortega@gmail.com'))
                    ->subject('Promoción - Nuevo contacto')
                    ->html(
                        '<p>¡Hola!</p>
                        <p>Hemos recibido un nuevo contacto a través del formulario:</p>
                        <ul>
                            <li>Nombre: <strong>'. $form->get('nombre')->getData() .'</strong></li>
                            <li>Apellidos: <strong>'. $form->get('apellidos')->getData() .'</strong></li>
                            <li>Teléfono: <strong>'. $form->get('telefono')->getData() .'</strong></li>
                            <li>Email: <strong>'. $form->get('email')->getData() .'</strong></li>
                            <li>Tipo de Vehículo: <strong>'. $form->get('tipoVehiculo')->getData() .'</strong></li>
                            <li>Vehículo: <strong>'. $form->get('vehiculo')->getData() .'</strong></li>
                            <li>Preferencia de llamada:<strong>'. $form->get('preferenciaLlamada')->getData() .'</strong></li>
                        </ul>'
                    );

                $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
                $mailer = new Mailer($transport);

                $mailer->send($email);

                return $this->render('gracias/gracias.html.twig', [
                    'nombre' => $form->get('nombre')->getData(),
                ]);

            } catch (TransportExceptionInterface $e) {
                return new Response($e->getMessage());
            }
        }

        return $this->render('promocion/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
