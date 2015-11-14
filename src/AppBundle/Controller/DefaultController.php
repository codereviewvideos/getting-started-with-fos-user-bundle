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
        // not advisable in real life, just a lazy demo hack
        $routes = $this->get('routing.loader')->load(self::class)->all();

        return $this->render('default/index.html.twig', [
            'routes' => $routes,
        ]);
    }

    /**
     * @Route("/alternative-login", name="alternative_login")
     */
    public function alternativeLoginAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'text' => 'an alternative log in page'
        ]);
    }

    /**
     * @Route("/alternative-logout", name="alternative_logout")
     */
    public function alternativeLogoutAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'text' => 'an alternative logout page'
        ]);
    }

    /**
     * @Route("/secured/some-page", name="some_secured_page")
     */
    public function securePageAction(Request $request)
    {
        return $this->render('secure/secure.html.twig', ['text'=>'lorum ipsum']);
    }

    /**
     * @Route("/secured/another-page", name="another_secured_page")
     */
    public function anotherSecurePageAction(Request $request)
    {
        return $this->render('secure/secure.html.twig', ['text'=>'cats and dogs']);
    }
}
