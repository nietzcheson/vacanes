<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestsRepository")
 */
class Request
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
    * @ORM\ManyToOne(targetEntity="RequestType", inversedBy="request")
    * @ORM\JoinColumn(name="request_type_id", referencedColumnName="id")
    */
    private $requestType;

    /**
    * @ORM\ManyToOne(targetEntity="UserOwner", inversedBy="requests")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $userOwner;

    /**
     * @ORM\OneToOne(targetEntity="DayRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $dayRequest;

    /**
     * @ORM\OneToOne(targetEntity="NightRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $nightRequest;

    /**
     * @ORM\OneToOne(targetEntity="PetValetRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $petValetRequest;

    /**
     * @ORM\OneToMany(targetEntity="UserWatcherRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $userWatcherRequests;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userWatcherRequests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set address
     *
     * @param string $address
     *
     * @return Request
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set requestType
     *
     * @param \AppBundle\Entity\RequestType $requestType
     *
     * @return Request
     */
    public function setRequestType(\AppBundle\Entity\RequestType $requestType = null)
    {
        $this->requestType = $requestType;

        return $this;
    }

    /**
     * Get requestType
     *
     * @return \AppBundle\Entity\RequestType
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * Set userOwner
     *
     * @param \AppBundle\Entity\UserOwner $userOwner
     *
     * @return Request
     */
    public function setUserOwner(\AppBundle\Entity\UserOwner $userOwner = null)
    {
        $this->userOwner = $userOwner;

        return $this;
    }

    /**
     * Get userOwner
     *
     * @return \AppBundle\Entity\UserOwner
     */
    public function getUserOwner()
    {
        return $this->userOwner;
    }

    /**
     * Set dayRequest
     *
     * @param \AppBundle\Entity\DayRequest $dayRequest
     *
     * @return Request
     */
    public function setDayRequest(\AppBundle\Entity\DayRequest $dayRequest = null)
    {
        $this->dayRequest = $dayRequest;

        return $this;
    }

    /**
     * Get dayRequest
     *
     * @return \AppBundle\Entity\DayRequest
     */
    public function getDayRequest()
    {
        return $this->dayRequest;
    }

    /**
     * Set nightRequest
     *
     * @param \AppBundle\Entity\NightRequest $nightRequest
     *
     * @return Request
     */
    public function setNightRequest(\AppBundle\Entity\NightRequest $nightRequest = null)
    {
        $this->nightRequest = $nightRequest;

        return $this;
    }

    /**
     * Get nightRequest
     *
     * @return \AppBundle\Entity\NightRequest
     */
    public function getNightRequest()
    {
        return $this->nightRequest;
    }

    /**
     * Set petValetRequest
     *
     * @param \AppBundle\Entity\PetValetRequest $petValetRequest
     *
     * @return Request
     */
    public function setPetValetRequest(\AppBundle\Entity\PetValetRequest $petValetRequest = null)
    {
        $this->petValetRequest = $petValetRequest;

        return $this;
    }

    /**
     * Get petValetRequest
     *
     * @return \AppBundle\Entity\PetValetRequest
     */
    public function getPetValetRequest()
    {
        return $this->petValetRequest;
    }

    /**
     * Add userWatcherRequest
     *
     * @param \AppBundle\Entity\UserWatcherRequest $userWatcherRequest
     *
     * @return Request
     */
    public function addUserWatcherRequest(\AppBundle\Entity\UserWatcherRequest $userWatcherRequest)
    {
        $this->userWatcherRequests[] = $userWatcherRequest;

        return $this;
    }

    /**
     * Remove userWatcherRequest
     *
     * @param \AppBundle\Entity\UserWatcherRequest $userWatcherRequest
     */
    public function removeUserWatcherRequest(\AppBundle\Entity\UserWatcherRequest $userWatcherRequest)
    {
        $this->userWatcherRequests->removeElement($userWatcherRequest);
    }

    /**
     * Get userWatcherRequests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserWatcherRequests()
    {
        return $this->userWatcherRequests;
    }
}
