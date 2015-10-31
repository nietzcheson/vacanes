<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * User
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UsersRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", length=255, unique=true, nullable=false)
     */
    private $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;


    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=40, nullable=true)
     */
    private $token;


    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive = true;

    /**
     * @ORM\OneToOne(targetEntity="UsersOwner", mappedBy="user", cascade={"persist", "remove"})
     */
    private $usersOwners;

    /**
     * @ORM\OneToOne(targetEntity="UserWatcher", mappedBy="user", cascade={"persist", "remove"})
     */
    private $usersWatchers;

}
