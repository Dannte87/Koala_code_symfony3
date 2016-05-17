<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/17/16
 * Time: 4:33 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\LayerBundle\Entity\Composite;
/**
 * @ORM\Entity
 * @ORM\Table(name="p_o")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductOrder
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
   * @ORM\ManyToOne(targetEntity="Product", inversedBy="po")
   * @ORM\JoinColumn(name="p_id", referencedColumnName="id")
   * */
  protected $product;
  /**
   * @ORM\ManyToOne(targetEntity="Order", inversedBy="po")
   * @ORM\JoinColumn(name="o_id", referencedColumnName="id")
   * */
  protected $order;

  public function __construct()
  {
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct($product)
  {
    $this->product = $product;
  }

  public function getOrder()
  {
    return $this->order;
  }

  public function setOrder($order)
  {
    $this->order = $order;
  }


  public function __toString()
  {
    return (string)$this->product;
  }
}