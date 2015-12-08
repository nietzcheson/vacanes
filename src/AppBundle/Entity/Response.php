<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Response
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ResponseRepository")
 */
class Response
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"request"})
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     * @Groups({"request"})
     */
    private $price;

    /**
    * @ORM\OneToOne(targetEntity="WatcherRequest", inversedBy="response")
    * @ORM\JoinColumn(name="watcher_request_id", referencedColumnName="id")
    * @Groups({"request"})
    */
    private $watcherRequest;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     * @Groups({"request"})
     */
    private $comments;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accepted", type="boolean", nullable=true)
     * @Groups({"request"})
     */
    private $accepted;

    /**
     * @ORM\OneToOne(targetEntity="Calification", inversedBy="response")
     * @Groups({"request"})
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
     * Set watcherRequest
     *
     * @param \AppBundle\Entity\WatcherRequest $watcherRequest
     *
     * @return Response
     */
    public function setWatcherRequest(\AppBundle\Entity\WatcherRequest $watcherRequest = null)
    {
        $this->watcherRequest = $watcherRequest;

        return $this;
    }

    /**
     * Get watcherRequest
     *
     * @return \AppBundle\Entity\WatcherRequest
     */
    public function getWatcherRequest()
    {
        return $this->watcherRequest;
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
