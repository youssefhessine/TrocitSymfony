<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private $mailer;
    //private $replyTo;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        //$this->replyTo = $replyTo;
    }
    public function sendEmail(
        $to = 'hessine.youssef@esprit.tn',
        $content = '<p>its works</p>',
        $subject = 'Time for Symfony Mailer!'
    ): void {
        $from = urlencode('trocitesprit2023@gmail.com');
        $to = urlencode($to);
    
        $email = (new Email())
            ->from(urldecode($from))
            ->to(urldecode($to))
           // ->replyTo($this->replyTo)
            ->subject($subject)
            ->html($content);
    
        $this->mailer->send($email);
    }

}