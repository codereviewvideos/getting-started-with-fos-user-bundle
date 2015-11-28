<?php

namespace AppBundle\Event;

use FOS\UserBundle\Model\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RegistrationRouteListener
{
    /**
     * @var RouterInterface
     */
    private $routerInterface;
    private $registrationEnabled;

    public function __construct(RouterInterface $routerInterface, $registrationEnabled)
    {
        $this->routerInterface = $routerInterface;
        $this->registrationEnabled = $registrationEnabled;
    }
    
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($request->get('_route') !== 'fos_user_registration_register') {
            return;
        }

        if ($this->registrationEnabled === true) {
            return;
        }

        $event->setResponse(
            new RedirectResponse(
                $this->routerInterface->generate('registration_disabled')
            )
        );
    }
}