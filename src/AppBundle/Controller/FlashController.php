<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/flash")
 */
class FlashController extends Controller
{
    /**
     * @Route("/", name="flash_home")
     */
    public function indexAction(Request $request)
    {
        $this->addFlash('javascript', "console.log('hello');");

        return $this->render('admin/admin.html.twig', [
            'content' => $this->getDoctrine()->getRepository('AppBundle:Content')->findAll()
        ]);
    }

}
