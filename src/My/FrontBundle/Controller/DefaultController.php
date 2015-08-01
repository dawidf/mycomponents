<?php

namespace My\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MyFrontBundle:Default:index.html.twig', array('name' => $name));
    }
}
