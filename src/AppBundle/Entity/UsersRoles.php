<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Roles
 *
 * @ORM\Table(name="users_roles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRolesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class UsersRoles
{

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   * @var integer $id
   */
  protected $id;


  /**
   * @ORM\ManyToOne(targetEntity="Roles", inversedBy="usersRoles")
   * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
   * */
  protected $role;

  /**
   * @ORM\ManyToOne(targetEntity="Users", inversedBy="usersRoles")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   * */
  protected $user;

  public function __construct()
  {
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getRole()
  {
    return $this->role;
  }

  /**
   * @param mixed $role
   */
  public function setRole($role)
  {
    $this->role = $role;
  }

  /**
   * @return mixed
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * @param mixed $user
   */
  public function setUser($user)
  {
    $this->user = $user;
  }

  public function __toString()
  {
    return (string)$this->role;
  }
}

