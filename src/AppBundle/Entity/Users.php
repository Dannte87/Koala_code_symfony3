<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\UsersRoles;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users implements UserInterface
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   * @Assert\NotBlank()
   * @ORM\Column(name="login", type="string", length=100, unique=true)
   */
  private $login;

  /**
   * @var string
   * @Assert\NotBlank()
   * @ORM\Column(name="password", type="string", length=255, unique=true)
   */
  private $password;

  /**
   * @var string
   * @Assert\NotBlank()
   * @ORM\Column(name="email", type="string", length=255, unique=true)
   */
  private $email;

  /**
   * @var string
   * @Assert\NotBlank
   * @ORM\Column(type="string", length=100)
   */
  private $first_name;

  /**
   * @var string
   * @Assert\NotBlank()
   * @ORM\Column(type="string", length=100)
   */
  private $last_name;

  /**
   * @var string
   *
   * @ORM\Column(type="text")
   */
  private $description;

  /**
   * @var int
   * @Assert\NotBlank()
   * @ORM\Column(type="integer")
   */
  private $karma;

  /**
   * @var int
   *
   * @ORM\Column(type="datetime")
   */
  private $created_date;

  /**
   *
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $deleted_date = null;

  /**
   *
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $updated_date = null;

  /**
   *
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $banned_date = null;

  /**
   * @var int
   *
   * @ORM\Column(type="text", nullable=true)
   */
  private $banned_for = null;

  /**
   * @var int
   * @ORM\Column(type="integer", nullable=true)
   */
  private $deleted_user_id = null;

  /**
   * @var int
   *
   * @ORM\Column(type="integer", nullable=true)
   */
  private $banned_user_id = null;

  /**
   * @var int
   *
   * @ORM\Column(type="integer", nullable=true)
   */
  private $update_user_id = null;

  /**
   * @ORM\Column(type="string", length="255")
   *
   * @var string salt
   */
  protected $salt;

  /**
   * @ORM\OneToMany(targetEntity="UsersRoles", mappedBy="order", cascade={"all"}, orphanRemoval=true)
   * */
  private $usersRoles;

  private $role;

  public function __construct()
  {
    $this->role = new ArrayCollection();
    $this->usersRoles = new ArrayCollection();
  }

  public function __toString()
  {
    return $this->login;
  }

  public function getRole()
  {
    $role = new ArrayCollection();

    foreach($this->usersRoles as $ur)
    {
      $role[] = $ur->getRole();
    }

    return $role;
  }

  public function setRole($roles)
  {
    foreach($roles as $r)
    {
      $ur = new UsersRoles();

      $ur->setUser($this);
      $ur->setRole($r);

      $this->addUsersRoles($ur);
    }
  }

  /**
   * @return array An array of Role objects
   */
  public function getRoles()
  {
    return $this->getRole()->toArray();
  }


  public function getUser()
  {
    return $this;
  }

  public function addUsersRoles($userRole)
  {
    $this->usersRoles[] = $userRole;
  }

  public function removeUsersRoles($userRole)
  {
    return $this->usersRoles->removeElement($userRole);
  }

  /**
   * Get id
   *
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set login
   *
   * @param string $login
   *
   * @return Users
   */
  public function setLogin($login)
  {
    $this->login = $login;

    return $this;
  }

  /**
   * Get login
   *
   * @return string
   */
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * Set password
   *
   * @param string $password
   *
   * @return Users
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get password
   *
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->first_name;
  }

  /**
   * @param string $first_name
   */
  public function setFirstName($first_name)
  {
    $this->first_name = $first_name;
  }

  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->last_name;
  }

  /**
   * @param string $last_name
   */
  public function setLastName($last_name)
  {
    $this->last_name = $last_name;
  }

  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }

  /**
   * @return mixed
   */
  public function getKarma()
  {
    return $this->karma;
  }

  /**
   * @param mixed $karma
   */
  public function setKarma($karma)
  {
    $this->karma = $karma;
  }

  /**
   * @return mixed
   */
  public function getCreatedDate()
  {
    return $this->created_date;
  }

  /**
   * @param mixed $created_date
   */
  public function setCreatedDate($created_date)
  {
    $this->created_date = $created_date;
  }

  /**
   * @return int
   */
  public function getDeletedDate()
  {
    return $this->deleted_date;
  }

  /**
   * @param int $deleted_date
   */
  public function setDeletedDate($deleted_date)
  {
    $this->deleted_date = $deleted_date;
  }

  /**
   * @return int
   */
  public function getUpdatedDate()
  {
    return $this->updated_date;
  }

  /**
   * @param int $updated_date
   */
  public function setUpdatedDate($updated_date)
  {
    $this->updated_date = $updated_date;
  }

  /**
   * @return int
   */
  public function getBannedDate()
  {
    return $this->banned_date;
  }

  /**
   * @param int $banned_date
   */
  public function setBannedDate($banned_date)
  {
    $this->banned_date = $banned_date;
  }

  /**
   * @return int
   */
  public function getBannedFor()
  {
    return $this->banned_for;
  }

  /**
   * @param int $banned_for
   */
  public function setBannedFor($banned_for)
  {
    $this->banned_for = $banned_for;
  }

  /**
   * @return int
   */
  public function getDeletedUserId()
  {
    return $this->deleted_user_id;
  }

  /**
   * @param int $deleted_user_id
   */
  public function setDeletedUserId($deleted_user_id)
  {
    $this->deleted_user_id = $deleted_user_id;
  }

  /**
   * @return int
   */
  public function getBannedUserId()
  {
    return $this->banned_user_id;
  }

  /**
   * @param int $banned_user_id
   */
  public function setBannedUserId($banned_user_id)
  {
    $this->banned_user_id = $banned_user_id;
  }

  /**
   * @return int
   */
  public function getUpdateUserId()
  {
    return $this->update_user_id;
  }

  /**
   * @param int $update_user_id
   */
  public function setUpdateUserId($update_user_id)
  {
    $this->update_user_id = $update_user_id;
  }

  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return string The login.
   */
  public function getUsername()
  {
    return $this->login;
  }

  /**
   * @return string The salt.
   */
  public function getSalt()
  {
    return $this->salt;
  }

  /**
   * @param string $value The salt.
   */
  public function setSalt($value)
  {
    $this->salt = $value;
  }

  /**
   * @param UserInterface $user The user
   * @return boolean True if equal, false othwerwise.
   */
  public function equals(UserInterface $user)
  {
    return md5($this->getEmail()) == md5($user->getEmail());
  }

  public function eraseCredentials(){}
}

