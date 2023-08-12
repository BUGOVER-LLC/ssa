<?php

declare(strict_types=1);

namespace App\Core;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendEmail extends Email
{
    private Mailer $mailer;

    /**
     * @return void
     * @throws TransportExceptionInterface
     */
    public function send(): void
    {
        $transport = Transport::fromDsn(env('MAILER_DSN'));
        $this->mailer = new Mailer($transport);

        $this->mailer->send($this);
    }
}
