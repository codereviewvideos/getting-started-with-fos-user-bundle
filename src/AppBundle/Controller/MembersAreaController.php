<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Content;
use AppBundle\Security\Authorization\Voter\ContentVoter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/members-area")
 */
class MembersAreaController extends Controller
{
    /**
     * @Route("/", name="member_home")
     */
    public function indexAction(Request $request)
    {
        $content = $this->getUser()->getContent();

        return $this->render('members_area/members.html.twig', [
            'content' => $content
        ]);
    }

    /**
     * @Route("/create", name="member_create")
     */
    public function createAction(Request $request)
    {
        return $this->render('members_area/members.html.twig', [
            'text' => sprintf('Allowed to CREATE')
        ]);
    }

    /**
     * @Route("/edit/{id}", name="member_edit")
     */
    public function editAction(Request $request, Content $content)
    {
        $this->denyAccessUnlessGranted('view', $content);

        return $this->render('members_area/members.html.twig', [
            'text' => sprintf('Allowed to EDIT id: %d', $content->getId())
        ]);
    }
}
