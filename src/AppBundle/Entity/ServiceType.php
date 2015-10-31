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
    
}
