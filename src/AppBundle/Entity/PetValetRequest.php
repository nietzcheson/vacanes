<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
    * @ORM\OneToOne(targetEntity="Request", inversedBy="petValetRequest")
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
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="datetime")
     */
    private $startTime;

    /**
     * @var \DateTime
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
}
