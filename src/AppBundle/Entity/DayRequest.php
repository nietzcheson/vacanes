<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DayRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DayRequestsRepository")
 */
class DayRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"dayRequest"})
     */
    private $id;

    /**
    * @ORM\OneToOne(targetEntity="Request", inversedBy="dayRequest")
    * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    */
    private $request;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     * @Groups({"dayRequest"})
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     * @Groups({"dayRequest"})
     */
    private $endDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     * @Groups({"dayRequest"})
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     * @Groups({"dayRequest"})
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Groups({"dayRequest"})
     */
    private $comments;

    /**
     * @var integer
     * @ORM\Column(name="service_type", type="integer")
     * @Groups({"dayRequest"})
    */
    private $serviceType;

    /**
     * @var integer
     * @ORM\Column(name="service_days", type="integer")
     * @Groups({"dayRequest"})
    */
    private $serviceDays;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return DayRequest
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
     * @return DayRequest
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

    /**
     * Set serviceType
     *
     * @param integer $serviceType
     *
     * @return DayRequest
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
     * Set serviceDays
     *
     * @param integer $serviceDays
     *
     * @return DayRequest
     */
    public function setServiceDays($serviceDays)
    {
        $this->serviceDays = $serviceDays;

        return $this;
    }

    /**
     * Get serviceDays
     *
     * @return integer
     */
    public function getServiceDays()
    {
        return $this->serviceDays;
    }

    /**
     * Set request
     *
     * @param \AppBundle\Entity\Request $request
     *
     * @return DayRequest
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
