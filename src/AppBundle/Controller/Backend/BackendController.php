<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class BackendController extends Controller
{
  /**
   * @Route("/admin")
   */
  public function indexAction(Request $request)
  {
    return $this->render('backend/index.html.twig');
  }
}
