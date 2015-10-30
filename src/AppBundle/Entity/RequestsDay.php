<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestsDay
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestsDayRepository")
 */
class RequestsDay
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
    * @ORM\ManyToOne(targetEntity="Requests", inversedBy="requestsDay")
    * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    */
    private $requests;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="serviceDate", type="datetime")
     */
    private $serviceDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="startTime", type="time")
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="endTime", type="time")
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

    /**
    * @ORM\ManyToOne(targetEntity="ServicesTypes", inversedBy="requestsDay")
    * @ORM\JoinColumn(name="service_type_id", referencedColumnName="id")
    */
    private $servicesTypes;


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
     * Set requests
     *
     * @param integer $requests
     *
     * @return RequestsDay
     */
    public function setRequests($requests)
    {
        $this->requests = $requests;

        return $this;
    }

    /**
     * Get requests
     *
     * @return integer
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Set serviceDate
     *
     * @param \DateTime $serviceDate
     *
     * @return RequestsDay
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
     * @return RequestsDay
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
     * @return RequestsDay
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
     * @return RequestsDay
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
     * Set servicesTypes
     *
     * @param integer $servicesTypes
     *
     * @return RequestsDay
     */
    public function setServicesTypes($servicesTypes)
    {
        $this->servicesTypes = $servicesTypes;

        return $this;
    }

    /**
     * Get servicesTypes
     *
     * @return integer
     */
    public function getServicesTypes()
    {
        return $this->servicesTypes;
    }
}
