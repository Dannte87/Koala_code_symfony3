<?php

namespace AppBundle\Forms;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Tests\Extension\Core\Type\PasswordTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {

    $builder->setMethod("POST");
    $builder->setAction('/admin/users/add');
    $builder->add('login', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('password', PasswordType::class, array('attr' => array('class' => 'form-control')))
            ->add('email', EmailType::class, array('attr' => array('class' => 'form-control')))
            ->add('first_name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('last_name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('karma', IntegerType::class, array('attr' => array('class' => 'form-control')))
            ->add('role', EntityType::class, array(
              'class'        => 'AppBundle:Roles',
              'choice_label' => 'name',
              'expanded'     => true,
              'multiple'     => true,
            ))
            ->add('add', SubmitType::class, array(
              'label' => 'Add'
            ));
    $builder->setAttribute('class', 'form-horizontal');

  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Users',
      'em'         => '' ,
    ));
  }

  public function getName()
  {
    return 'user_form';
  }
}