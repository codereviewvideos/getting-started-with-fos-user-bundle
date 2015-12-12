<?php

namespace AppBundle\Event;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use Rezzza\MailChimpBundle\Api\Client;

class RegistrationMailingListener
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function onRegistrationCompleted(FilterUserResponseEvent $event)
    {
        $user = $event->getUser();

        $response = $this->client->getMailChimpLists()->subscribe('8abfe0f87d', [
            'email' => $user->getEmail(),
        ]);

//        exit(dump($response));
    }
}