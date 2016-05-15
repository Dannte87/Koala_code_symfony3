<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Forms\RoleForm;
use AppBundle\Entity\Roles;

class RoleController extends Controller
{
  /**
   * @Route("/admin/roles")
   */
  public function indexAction(Request $request)
  {
    $roles = $this->getDoctrine()->getRepository('AppBundle:Roles');

    return $this->render('backend/role_list.html.twig', array(
      'roles' => $roles->findAll()
    ));
  }

  /**
   * @Route("/admin/roles/add")
   */
  public function addNewAction(Request $request)
  {
    $role = new Roles();
    $form = $this->createForm(RoleForm::class, $role);
    $em   = $this->getDoctrine()->getManager();

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) {

      $em->persist($role);
      $em->flush();

      $roles = $em->getRepository('AppBundle:Roles');

      return $this->render('backend/role_list.html.twig', array(
        'roles' => $roles->findAll()
      ));
    }

    return $this->render('backend/add_roles.html.twig', array(
      'form' => $form->createView()
    ));
  }
}
