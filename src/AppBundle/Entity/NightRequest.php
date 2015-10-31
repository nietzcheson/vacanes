<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="start_service_date", type="datetime")
     */
    private $startServiceDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_service_date", type="datetime")
     */
    private $endServiceDate;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

    /**
    * @ORM\ManyToOne(targetEntity="ServiceType", inversedBy="nightRequest")
    * @ORM\JoinColumn(name="service_type_id", referencedColumnName="id")
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
     * Set startServiceDate
     *
     * @param \DateTime $startServiceDate
     *
     * @return NightRequest
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
     * @return NightRequest
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

    /**
     * Set serviceType
     *
     * @param \AppBundle\Entity\ServiceType $serviceType
     *
     * @return NightRequest
     */
    public function setServiceType(\AppBundle\Entity\ServiceType $serviceType = null)
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * Get serviceType
     *
     * @return \AppBundle\Entity\ServiceType
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }
}
