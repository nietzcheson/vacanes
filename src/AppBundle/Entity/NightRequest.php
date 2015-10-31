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
}
