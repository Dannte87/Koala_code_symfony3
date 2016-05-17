<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/17/16
 * Time: 4:35 PM
 */

namespace AppBundle\Forms;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class OrderType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder , array $options)
  {
    $builder
      ->add('name', TextType::class)
      ->add('product' , EntityType::class , array(
        'class'    => 'AppBundle:Product' ,
        'choice_label' => 'name' ,
        'expanded' => true ,
        'multiple' => true , ))
    ;
  }

//  public function getName()
//  {
//    return 'pmi_testbundle_ordertype';
//  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Order',
      'em'         => '' ,
    ));
  }
}