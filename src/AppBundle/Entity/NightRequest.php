<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"nightRequest"})
     */
    private $id;

    // /**
    // * @ORM\OneToOne(targetEntity="Request", inversedBy="nightRequest")
    // * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    // */
    // private $request;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Groups({"nightRequest"})
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
     * @ORM\Column(name="start_date", type="datetime")
     * @Groups({"nightRequest"})
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     * @Groups({"nightRequest"})
     */
    private $endDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     * @Groups({"nightRequest"})
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     * @Groups({"nightRequest"})
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Groups({"nightRequest"})
     */
    private $comments;

    /**
     * @var integer
     * @ORM\Column(name="service_type", type="integer")
     * @Groups({"nightRequest"})
    */
    private $serviceType;
}
