<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_home")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/admin.html.twig', [
            'content' => $this->getDoctrine()->getRepository('AppBundle:Content')->findAll()
        ]);
    }

    /**
     * @Route("/moderate/{id}", name="admin_moderate")
     */
    public function moderateAction(Request $request, $id)
    {
        return $this->render('admin/admin.html.twig', [
            'text' => sprintf('Allowed to MODERATE id: %d', $id)
        ]);
    }

    /**
     * @Route("/delete/{id}", name="admin_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->render('admin/admin.html.twig', [
            'text' => sprintf('Allowed to DELETE id: %d', $id)
        ]);
    }
}
