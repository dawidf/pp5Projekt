<?php

namespace Extremism\CarRentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExtremismCarRentalBundle:Default:index.html.twig');
    }
}
