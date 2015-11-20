<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"user"})
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", length=255, unique=true, nullable=false)
     * @Groups({"user"})
     */
    private $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     * @Groups({"user"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     * @Groups({"user"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Groups({"user"})
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     * @Groups({"user"})
     */
    private $lastLogin;


    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=40, nullable=true)
     * @Groups({"user"})
     */
    private $token;


    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     * @Groups({"user"})
     */
    private $isActive = true;

    /**
     * @ORM\OneToOne(targetEntity="Owner", mappedBy="user", cascade={"persist", "remove"})
     */
    private $owner;

    /**
     * @ORM\OneToOne(targetEntity="UserWatcher", mappedBy="user", cascade={"persist", "remove"})
     */
    private $userWatcher;

    public function __construct()
    {
        $this->isActive = true;
        $this->lastLogin = new \Datetime('now');
        $this->updatedAt = new \Datetime('now');
    }
}
