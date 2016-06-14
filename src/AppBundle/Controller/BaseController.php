<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;
use AppBundle\Repository\UsersRepository;

/**
 * @Route(service="app.base.controller")
 */
class BaseController extends Controller
{
  protected $userRepository;

  private $templating;

  public function __construct(EntityManager $em, EngineInterface $templating)
  {
    $this->userRepository = $em->getRepository('AppBundle:Users');
    $this->templating     = $templating;
  }

//  /**
//   * @param $template string
//   * @param $params array
//   * @return Response
//  */
//  public function render($template, array $params)
//  {
//    return $this->templating->renderResponse($template, $params);
//  }
}