<?php

namespace ChrisUserBundle\Controller;

use \FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends BaseController
{
    public function registerAction(Request $request)
    {
        exit('hit this ');

        if ($this->container->hasParameter('registration_enabled')) {

            if ($this->getParameter('registration_enabled') === false) {

                return $this->render(':registration:disabled.html.twig');

            }

        }

        return parent::registerAction($request);
    }
}
