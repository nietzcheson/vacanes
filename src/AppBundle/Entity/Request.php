<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestsRepository")
 */
class Request
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
    * @ORM\ManyToOne(targetEntity="RequestType", inversedBy="requests")
    * @ORM\JoinColumn(name="request_type_id", referencedColumnName="id")
    */
    private $type;

    /**
    * @ORM\ManyToOne(targetEntity="UserOwner", inversedBy="requests")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $userOwner;
    
    /**
     * @ORM\OneToOne(targetEntity="DayRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $dayRequest;

    /**
     * @ORM\OneToOne(targetEntity="NightRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $nightRequest;

    /**
     * @ORM\OneToOne(targetEntity="PetValetRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $petValetRequest;
    
    /**
     * @ORM\OneToMany(targetEntity="UserWatcherRequest", mappedBy="request", cascade={"persist", "remove"})
     */
    private $userWatcherRequests;
    
}
