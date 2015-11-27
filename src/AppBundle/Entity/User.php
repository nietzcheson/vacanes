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
     * @ORM\OneToOne(targetEntity="Watcher", mappedBy="user", cascade={"persist", "remove"})
     */
    private $watcher;

    public function __construct()
    {
        $this->isActive = true;
        $this->lastLogin = new \Datetime('now');
        $this->updatedAt = new \Datetime('now');
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\Owner $owner
     *
     * @return User
     */
    public function setOwner(\AppBundle\Entity\Owner $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AppBundle\Entity\Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set userWatcher
     *
     * @param \AppBundle\Entity\UserWatcher $userWatcher
     *
     * @return User
     */
    public function setUserWatcher(\AppBundle\Entity\UserWatcher $userWatcher = null)
    {
        $this->userWatcher = $userWatcher;

        return $this;
    }

    /**
     * Get userWatcher
     *
     * @return \AppBundle\Entity\UserWatcher
     */
    public function getUserWatcher()
    {
        return $this->userWatcher;
    }

    /**
     * Set watcher
     *
     * @param \AppBundle\Entity\Watcher $watcher
     *
     * @return User
     */
    public function setWatcher(\AppBundle\Entity\Watcher $watcher = null)
    {
        $this->watcher = $watcher;

        return $this;
    }

    /**
     * Get watcher
     *
     * @return \AppBundle\Entity\Watcher
     */
    public function getWatcher()
    {
        return $this->watcher;
    }

    /**
     * Add watcher
     *
     * @param \AppBundle\Entity\Watcher $watcher
     *
     * @return User
     */
    public function addWatcher(\AppBundle\Entity\Watcher $watcher)
    {
        $this->watcher[] = $watcher;

        return $this;
    }

    /**
     * Remove watcher
     *
     * @param \AppBundle\Entity\Watcher $watcher
     */
    public function removeWatcher(\AppBundle\Entity\Watcher $watcher)
    {
        $this->watcher->removeElement($watcher);
    }
}
