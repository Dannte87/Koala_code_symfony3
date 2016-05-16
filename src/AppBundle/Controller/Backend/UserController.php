<?php

namespace AppBundle\Controller\Backend;

use AppBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Forms\UserForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
  /**
   * @Route("/admin/users")
   */
  public function indexAction(Request $request)
  {
    $users = $this->getDoctrine()->getRepository('AppBundle:Users');

    return $this->render('backend/user_list.html.twig', array(
      'users' => $users->findAll())
    );
  }

  /**
   * @Route("/admin/users/add")
   */
  public function addUsersAction(Request $request)
  {
    $em    = $this->getDoctrine()->getManager();
    $user  = new Users();
    $roles = $em->getRepository('AppBundle:Roles')->findAll();

    $user->setKarma(100);

    foreach ($roles as $role)
    {
      $user->getRole()->add($role);
    }

    $form = $this->createForm(UserForm::class, $user);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $user->setCreatedDate(new \DateTime());
      $user->setPassword(
        $this->encodePassword($user, $user->getPassword())
      );

      $em->persist($user);
      $em->flush();

      $users = $em->getRepository('AppBundle:Users');

      return $this->render('backend/user_list.html.twig', array(
        'users' => $users->findAll())
      );
    }

    return $this->render('backend/add_user.html.twig', array(
      'form' => $form->createView()
    ));
  }

}
