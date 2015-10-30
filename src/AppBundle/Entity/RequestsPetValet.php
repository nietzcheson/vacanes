<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestsPetValet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestsPetValetRepository")
 */
class RequestsPetValet
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
    * @ORM\ManyToOne(targetEntity="Requests", inversedBy="requestsPetValet")
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
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="datetime")
     */
    private $startTime;

    /**
     * @var \DateTime
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
     * @return RequestsPetValet
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
     * @return RequestsPetValet
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
     * @return RequestsPetValet
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
     * @return RequestsPetValet
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
     * @return RequestsPetValet
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
