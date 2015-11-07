<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }


    /**
     * @Route("/secured/some-page", name="some-secured-page")
     */
    public function securePageAction(Request $request)
    {
        return $this->render('secure/secure.html.twig', ['text'=>'lorum ipsum']);
    }

    /**
     * @Route("/secured/another-page", name="another-secured-page")
     */
    public function anotherSecurePageAction(Request $request)
    {
        return $this->render('secure/secure.html.twig', ['text'=>'cats and dogs']);
    }
}
