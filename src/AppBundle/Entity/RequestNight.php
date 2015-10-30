<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestNight
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestNightRepository")
 */
class RequestNight
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
    * @ORM\ManyToOne(targetEntity="Requests", inversedBy="requestsNight")
    * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    */
    private $requests;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startServiceDate", type="datetime")
     */
    private $startServiceDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endServiceDate", type="datetime")
     */
    private $endServiceDate;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

    /**
    * @ORM\ManyToOne(targetEntity="ServicesTypes", inversedBy="requestsNight")
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
     * @return RequestNight
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
     * Set startServiceDate
     *
     * @param \DateTime $startServiceDate
     *
     * @return RequestNight
     */
    public function setStartServiceDate($startServiceDate)
    {
        $this->startServiceDate = $startServiceDate;

        return $this;
    }

    /**
     * Get startServiceDate
     *
     * @return \DateTime
     */
    public function getStartServiceDate()
    {
        return $this->startServiceDate;
    }

    /**
     * Set endServiceDate
     *
     * @param \DateTime $endServiceDate
     *
     * @return RequestNight
     */
    public function setEndServiceDate($endServiceDate)
    {
        $this->endServiceDate = $endServiceDate;

        return $this;
    }

    /**
     * Get endServiceDate
     *
     * @return \DateTime
     */
    public function getEndServiceDate()
    {
        return $this->endServiceDate;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return RequestNight
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
     * @return RequestNight
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
