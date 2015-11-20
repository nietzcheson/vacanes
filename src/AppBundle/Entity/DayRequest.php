<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DayRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DayRequestsRepository")
 */
class DayRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"dayRequest"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Groups({"dayRequest"})
     */
    private $address;

    /**
    * @ORM\ManyToOne(targetEntity="Owner", inversedBy="petValetRequest")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    // /**
    // * @ORM\OneToOne(targetEntity="Request", inversedBy="dayRequest")
    // * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    // */
    // private $request;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     * @Groups({"dayRequest"})
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     * @Groups({"dayRequest"})
     */
    private $endDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     * @Groups({"dayRequest"})
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     * @Groups({"dayRequest"})
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Groups({"dayRequest"})
     */
    private $comments;

    /**
     * @var integer
     * @ORM\Column(name="service_type", type="integer")
     * @Groups({"dayRequest"})
    */
    private $serviceType;

    /**
     * @var integer
     * @ORM\Column(name="service_days", type="integer")
     * @Groups({"dayRequest"})
    */
    private $serviceDays;
}
