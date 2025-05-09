<?php

declare(strict_types=1);

namespace Core\Abstract;

use Illuminate\Support\Facades\Notification;

/**
 * Interface NotifyContract
 *
 * @package Core\Contracts
 */
abstract class AbstractNotify extends Notification
{
    /**
     * @param $notifiable
     * @return mixed
     */
    public function toFcm($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toSlack($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toBroadcast($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toMail($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toNexmo($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toShortcode($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toVoice($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toDatabase($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toArray($notifiable)
    {
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return $this->channel;
    }
}
