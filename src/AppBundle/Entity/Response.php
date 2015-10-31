<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Response
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ResponsesRepository")
 */
class Response
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
    * @ORM\OneToOne(targetEntity="UsersWatcherRequest", inversedBy="response")
    * @ORM\JoinColumn(name="user_watcher_request_id", referencedColumnName="id")
    */
    private $usersWatcherRequest;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accepted", type="boolean")
     */
    private $accepted;

    /**
     * @ORM\OneToOne(targetEntity="Calification", inversedBy="response")
     */
    private $calification;
}
