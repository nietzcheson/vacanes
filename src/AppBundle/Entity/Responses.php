<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responses
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ResponsesRepository")
 */
class Responses
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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
    * @ORM\ManyToOne(targetEntity="Requests", inversedBy="responses")
    * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
    */
    private $requests;

    /**
    * @ORM\ManyToOne(targetEntity="UsersWatchers", inversedBy="responses")
    * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
    */
    private $usersWatchers;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Responses
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Responses
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set requests
     *
     * @param integer $requests
     *
     * @return Responses
     */
    public function setRequests($requests)
    {
        $this->requests = $requests;

        return $this;
    }

    /**
     * Get requests
     *
     * @return integer
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Set usersWatchers
     *
     * @param integer $usersWatchers
     *
     * @return Responses
     */
    public function setUsersWatchers($usersWatchers)
    {
        $this->usersWatchers = $usersWatchers;

        return $this;
    }

    /**
     * Get usersWatchers
     *
     * @return integer
     */
    public function getUsersWatchers()
    {
        return $this->usersWatchers;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Responses
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set accepted
     *
     * @param boolean $accepted
     *
     * @return Responses
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return boolean
     */
    public function getAccepted()
    {
        return $this->accepted;
    }
}
