<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * DayRequest
 *
 * @ORM\Table(name="v_day_request")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DayRequestRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class DayRequest extends ServiceRequest
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_date", type="date", nullable=false)
     */
    private $serviceDate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="start_time", type="string", length=32, nullable=false)
     */
    private $startTime;
    
    /**
     * @var string
     *
     * @ORM\Column(name="end_time", type="string", length=32, nullable=false)
     */
    private $endTime;
    
    /**
     * @var string
     *  
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=512, nullable=true)
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
     * Set serviceDate
     *
     * @param \DateTime $serviceDate
     *
     * @return DayRequest
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
     * @param string $startTime
     *
     * @return DayRequest
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param string $endTime
     *
     * @return DayRequest
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return DayRequest
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
     * Set comments
     *
     * @param string $comments
     *
     * @return DayRequest
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
}
