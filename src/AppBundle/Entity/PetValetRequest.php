<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * PetValetRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PetValetRequestsRepository")
 */
class PetValetRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"petValetRequest"})
     */
    private $id;

    // /**
    // * @ORM\OneToOne(targetEntity="Request", inversedBy="petValetRequest")
    // * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    // */
    // private $request;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Groups({"petValetRequest"})
     */
    private $address;

    /**
    * @ORM\ManyToOne(targetEntity="Owner", inversedBy="petValetRequest")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_date", type="datetime")
     * @Groups({"petValetRequest"})
     */
    private $serviceDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     * @Groups({"petValetRequest"})
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     * @Groups({"petValetRequest"})
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Groups({"petValetRequest"})
     */
    private $comments;

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
     * @return PetValetRequest
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
     * Set serviceDate
     *
     * @param \DateTime $serviceDate
     *
     * @return PetValetRequest
     */
    public function setServiceDate($serviceDate)
    {
        $this->serviceDate = $serviceDate;

        return $this;
    }

    /**
     * Get serviceDate
     *
     * @return \DateTime
     */
    public function getServiceDate()
    {
        return $this->serviceDate;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return PetValetRequest
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return PetValetRequest
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return PetValetRequest
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\Owner $owner
     *
     * @return PetValetRequest
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
}
