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
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('AppBundle:Page')->findAll();
        return $this->render('default/index.html.twig', array(
            'pages' => $pages
        ));
    }

    /**
     * @Route("/page/{id}", name="page_display")
     */

    public function displayAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')->find($id);
        return $this->render('default/display.html.twig', array(
            'page' => $page 
        ));
    }
}
