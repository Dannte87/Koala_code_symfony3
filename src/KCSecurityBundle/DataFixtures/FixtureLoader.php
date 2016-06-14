<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 6/1/16
 * Time: 11:22 PM
 */

namespace KCSecurityBundle\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KCSecurityBundle\Entity\User;
use KCSecurityBundle\Entity\Role;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class FixtureLoader implements FixtureInterface
{
   public function load(ObjectManager $manager)
   {
     // TODO: Implement load() method.
   }
}