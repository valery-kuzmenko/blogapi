<?php

namespace Blogger\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Entity\User as BaseUser;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 * @ExclusionPolicy("ALL")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @Groups({"user_list", "user_details"})
   * @Expose
   */
  protected $id;
  
}
