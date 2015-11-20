<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * PetValetRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PetValetRequestsRepository")
 */
class PetValetRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"petValetRequest"})
     */
    private $id;

    // /**
    // * @ORM\OneToOne(targetEntity="Request", inversedBy="petValetRequest")
    // * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    // */
    // private $request;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Groups({"petValetRequest"})
     */
    private $address;

    /**
    * @ORM\ManyToOne(targetEntity="Owner", inversedBy="petValetRequest")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_date", type="datetime")
     * @Groups({"petValetRequest"})
     */
    private $serviceDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     * @Groups({"petValetRequest"})
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     * @Groups({"petValetRequest"})
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Groups({"petValetRequest"})
     */
    private $comments;
}
