<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller
{
  /**
   * @Route("/admin/roles")
   */
  public function indexAction(Request $request)
  {
    return $this->render('backend/role_list.html.twig');
  }
}
