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
    * @ORM\OneToOne(targetEntity="UserWatcherRequest", inversedBy="response")
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
     * Set price
     *
     * @param float $price
     *
     * @return Response
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
     * Set comments
     *
     * @param string $comments
     *
     * @return Response
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
     * @return Response
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

    /**
     * Set usersWatcherRequest
     *
     * @param \AppBundle\Entity\UserWatcherRequest $usersWatcherRequest
     *
     * @return Response
     */
    public function setUsersWatcherRequest(\AppBundle\Entity\UserWatcherRequest $usersWatcherRequest = null)
    {
        $this->usersWatcherRequest = $usersWatcherRequest;

        return $this;
    }

    /**
     * Get usersWatcherRequest
     *
     * @return \AppBundle\Entity\UserWatcherRequest
     */
    public function getUsersWatcherRequest()
    {
        return $this->usersWatcherRequest;
    }

    /**
     * Set calification
     *
     * @param \AppBundle\Entity\Calification $calification
     *
     * @return Response
     */
    public function setCalification(\AppBundle\Entity\Calification $calification = null)
    {
        $this->calification = $calification;

        return $this;
    }

    /**
     * Get calification
     *
     * @return \AppBundle\Entity\Calification
     */
    public function getCalification()
    {
        return $this->calification;
    }
}