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
     * Set calification
     *
     * @param integer $calification
     *
     * @return Calification
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
     * @return Calification
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
     * Set response
     *
     * @param \AppBundle\Entity\Response $response
     *
     * @return Calification
     */
    public function setResponse(\AppBundle\Entity\Response $response = null)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return \AppBundle\Entity\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
