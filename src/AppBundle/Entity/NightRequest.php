<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * NightRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\NightRequestsRepository")
 */
class NightRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"nightRequest"})
     */
    private $id;

    /**
    * @ORM\OneToOne(targetEntity="Request", inversedBy="nightRequest")
    * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    */
    private $request;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     * @Groups({"nightRequest"})
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     * @Groups({"nightRequest"})
     */
    private $endDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     * @Groups({"nightRequest"})
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     * @Groups({"nightRequest"})
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Groups({"nightRequest"})
     */
    private $comments;

    /**
     * @var integer
     * @ORM\Column(name="service_type", type="integer")
     * @Groups({"nightRequest"})
    */
    private $serviceType;

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
     * @return NightRequest
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return NightRequest
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return NightRequest
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return NightRequest
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
     * @return NightRequest
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
     * @return NightRequest
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
     * Set serviceType
     *
     * @param integer $serviceType
     *
     * @return NightRequest
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * Get serviceType
     *
     * @return integer
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\Owner $owner
     *
     * @return NightRequest
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
     * Set request
     *
     * @param \AppBundle\Entity\Request $request
     *
     * @return NightRequest
     */
    public function setRequest(\AppBundle\Entity\Request $request = null)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request
     *
     * @return \AppBundle\Entity\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
