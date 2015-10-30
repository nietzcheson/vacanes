<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResponsesCalification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ResponsesCalificationRepository")
 */
class ResponsesCalification
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
     * @var integer
     *
     * @ORM\Column(name="responses", type="integer")
     */
    private $responses;

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
     * Set responses
     *
     * @param integer $responses
     *
     * @return ResponsesCalification
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return integer
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Set calification
     *
     * @param integer $calification
     *
     * @return ResponsesCalification
     */
    public function setCalification($calification)
    {
        $this->calification = $calification;

        return $this;
    }

    /**
     * Get calification
     *
     * @return integer
     */
    public function getCalification()
    {
        return $this->calification;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return ResponsesCalification
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
}
