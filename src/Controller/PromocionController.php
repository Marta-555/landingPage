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
                    ->to(new Address($form->get('email')->getData()))
                    ->subject('Promoción Opel - Gracias')
                    ->html(
                        '<p>¡Gracias por contarctar con nosotros!</p>
                        <p>En breve nos pondremos en contacto con usted para proporcionarle la información solicitada</p>'
                    );

                $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
                $mailer = new Mailer($transport);

                $mailer->send($email);

                return $this->redirectToRoute('gracias');

            } catch (TransportExceptionInterface $e) {
                return new Response($e->getMessage());
            }
        }

        return $this->render('promocion/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
