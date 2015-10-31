<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CalificationsRepository")
 */
class Calification
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
     * @ORM\OneToOne(targetEntity="Response", inversedBy="calification")
     * @ORM\JoinColumn(name="response_id", referencedColumnName="id")
     */
    private $response;

    /**
     * @var integer
     *
     * @ORM\Column(name="calification", type="integer")
     */
    private $calification;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

}
