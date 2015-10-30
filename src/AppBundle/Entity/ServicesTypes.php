<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicesTypes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ServicesTypesRepository")
 */
class ServicesTypes
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
     * @ORM\Column(name="serviceType", type="string", length=255)
     */
    private $serviceType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="RequestsDay", mappedBy="servicesTypes")
     */

    private $requestsDay;

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
     * Set serviceType
     *
     * @param string $serviceType
     *
     * @return ServicesTypes
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * Get serviceType
     *
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ServicesTypes
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requestsDay = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add requestsDay
     *
     * @param \AppBundle\Entity\RequestsDay $requestsDay
     *
     * @return ServicesTypes
     */
    public function addRequestsDay(\AppBundle\Entity\RequestsDay $requestsDay)
    {
        $this->requestsDay[] = $requestsDay;

        return $this;
    }

    /**
     * Remove requestsDay
     *
     * @param \AppBundle\Entity\RequestsDay $requestsDay
     */
    public function removeRequestsDay(\AppBundle\Entity\RequestsDay $requestsDay)
    {
        $this->requestsDay->removeElement($requestsDay);
    }

    /**
     * Get requestsDay
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestsDay()
    {
        return $this->requestsDay;
    }
}
