<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class TestMailController extends AbstractController
{
    // #[Route('/test/mail', name: 'app_test_mail')]
    // public function index(): Response
    // {
    //     return $this->render('test_mail/index.html.twig', [
    //         'controller_name' => 'TestMailController',
    //     ]);
    // }
        public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('your_email@example.com')
            ->to('recipient@example.com')
            ->subject('Test Email from Symfony')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        return new Response('Email sent!');
    }
}