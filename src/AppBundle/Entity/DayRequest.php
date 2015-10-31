<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
    * @ORM\OneToOne(targetEntity="Request", inversedBy="dayRequest")
    * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    */
    private $request;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_date", type="datetime")
     */
    private $serviceDate;

    /**
     * @var \time
     *
     * @ORM\Column(name="start_time", type="time")
     */
    private $startTime;

    /**
     * @var \time
     *
     * @ORM\Column(name="end_time", type="time")
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

    /**
    * @ORM\ManyToOne(targetEntity="ServiceType", inversedBy="dayRequest")
    * @ORM\JoinColumn(name="service_type_id", referencedColumnName="id")
    */
    private $serviceType;

}
