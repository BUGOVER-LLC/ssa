<?php

declare(strict_types=1);

namespace Infrastructure\Utils;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class SendEmail extends Email
{
    /**
     * @return void
     * @throws TransportExceptionInterface
     */
    public function send(): void
    {
        $transport = Transport::fromDsn(env('MAIL_MAILER'));
        $mailer = new Mailer($transport);

        $mailer->send($this);
    }
}
