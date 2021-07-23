<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Entity\ContactoFecha;
use App\Form\ContactoType;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class ContactoController extends AbstractController
{
    /**
     * @Route("/formularioContacto", name="contacto")
     */
    public function index(Request $request, LoggerInterface $logger): Response
    {
        $contacto = new Contacto();
        $formContacto = $this->createForm(ContactoType::class, $contacto);
        $mensajeRespuesta = '';
        $formContacto->handleRequest($request);
        if ($formContacto->isSubmitted() && $formContacto->isValid()) {

            try {
                $contacto = $formContacto->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $contactoFecha = $this->getDoctrine()->getRepository(ContactoFecha::class)->findOneBy(array('correo' => $contacto->getCorreo()));

                $puedeGuardar = true;

                if ($contactoFecha) {
                    $puedeGuardar = $contactoFecha->getFecha()->diff(new DateTime())->days >= 1;
                    $logger->info($contactoFecha->getFecha()->diff(new DateTime())->days);
                } else {
                    $contactoFecha = new ContactoFecha();
                    $contactoFecha->setCorreo($contacto->getCorreo());
                }

                if ($puedeGuardar) {
                    $contactoFecha->setFecha(new DateTime());

                    $entityManager->persist($contacto);
                    $entityManager->persist($contactoFecha);
                    $entityManager->flush();
                    $mensajeRespuesta = 'Mensaje enviado satisfactoriamente.';
                } else {
                    $mensajeRespuesta = 'No es posible enviar un mensaje mas de una vez por dia. Por favor intentelo nuevamente mañana.';

                }
            } catch (Exception $exception) {
                $mensajeRespuesta = 'Problemas al intentar enviar el mensaje.';
            }
        }

        return $this->render('contacto/index.html.twig', [
            'controller_name' => 'ContactoController',
            'formulario' => $formContacto->createView(),
            'mensajeRespuesta' => $mensajeRespuesta
        ]);
    }
}
