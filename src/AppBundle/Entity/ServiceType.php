<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ServiceTypesRepository")
 */
class ServiceType
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
     * @ORM\Column(name="service_type", type="string", length=255)
     */
    private $serviceType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="DayRequest", mappedBy="serviceType")
     */
    private $dayRequests;

    /**
     * @ORM\OneToMany(targetEntity="NightRequest", mappedBy="serviceType")
     */
    private $nightRequests;
    
    /**
     * @ORM\OneToMany(targetEntity="PetValetRequest", mappedBy="serviceType")
     */
    private $petValetRequests;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dayRequests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nightRequests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->petValetRequests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set serviceType
     *
     * @param string $serviceType
     *
     * @return ServiceType
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
     * @return ServiceType
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
     * Add dayRequest
     *
     * @param \AppBundle\Entity\DayRequest $dayRequest
     *
     * @return ServiceType
     */
    public function addDayRequest(\AppBundle\Entity\DayRequest $dayRequest)
    {
        $this->dayRequests[] = $dayRequest;

        return $this;
    }

    /**
     * Remove dayRequest
     *
     * @param \AppBundle\Entity\DayRequest $dayRequest
     */
    public function removeDayRequest(\AppBundle\Entity\DayRequest $dayRequest)
    {
        $this->dayRequests->removeElement($dayRequest);
    }

    /**
     * Get dayRequests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDayRequests()
    {
        return $this->dayRequests;
    }

    /**
     * Add nightRequest
     *
     * @param \AppBundle\Entity\NightRequest $nightRequest
     *
     * @return ServiceType
     */
    public function addNightRequest(\AppBundle\Entity\NightRequest $nightRequest)
    {
        $this->nightRequests[] = $nightRequest;

        return $this;
    }

    /**
     * Remove nightRequest
     *
     * @param \AppBundle\Entity\NightRequest $nightRequest
     */
    public function removeNightRequest(\AppBundle\Entity\NightRequest $nightRequest)
    {
        $this->nightRequests->removeElement($nightRequest);
    }

    /**
     * Get nightRequests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNightRequests()
    {
        return $this->nightRequests;
    }

    /**
     * Add petValetRequest
     *
     * @param \AppBundle\Entity\PetValetRequest $petValetRequest
     *
     * @return ServiceType
     */
    public function addPetValetRequest(\AppBundle\Entity\PetValetRequest $petValetRequest)
    {
        $this->petValetRequests[] = $petValetRequest;

        return $this;
    }

    /**
     * Remove petValetRequest
     *
     * @param \AppBundle\Entity\PetValetRequest $petValetRequest
     */
    public function removePetValetRequest(\AppBundle\Entity\PetValetRequest $petValetRequest)
    {
        $this->petValetRequests->removeElement($petValetRequest);
    }

    /**
     * Get petValetRequests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPetValetRequests()
    {
        return $this->petValetRequests;
    }
}
