<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserWatcherRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserWatcherRequestsRepository")
 */
class UserWatcherRequest
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
     * @ORM\ManyToOne(targetEntity="Request", inversedBy="UserWatcherRequests")
     * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
     */
    private $request;

    /**
     * @ORM\ManyToOne(targetEntity="Watcher", inversedBy="UserWatcherRequests")
     * @ORM\JoinColumn(name="watcher_id", referencedColumnName="id")
     */
    private $watcher;

    /**
     * @var boolean
     *
     * @ORM\Column(name="viewed", type="boolean")
     */
    private $viewed;

    /**
     * @ORM\OneToOne(targetEntity="Response", mappedBy="userWatcherRequest", cascade={"persist", "remove"})
     */
    private $response;

    public function __construct()
    {
        $this->viewed = 0;
    }

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
     * Set viewed
     *
     * @param boolean $viewed
     *
     * @return UserWatcherRequest
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;

        return $this;
    }

    /**
     * Get viewed
     *
     * @return boolean
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set request
     *
     * @param \AppBundle\Entity\Request $request
     *
     * @return UserWatcherRequest
     */
    public function setRequest(\AppBundle\Entity\Request $request = null)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request
     *
     * @return \AppBundle\Entity\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set watcher
     *
     * @param \AppBundle\Entity\Watcher $watcher
     *
     * @return UserWatcherRequest
     */
    public function setWatcher(\AppBundle\Entity\Watcher $watcher = null)
    {
        $this->watcher = $watcher;

        return $this;
    }

    /**
     * Get watcher
     *
     * @return \AppBundle\Entity\Watcher
     */
    public function getWatcher()
    {
        return $this->watcher;
    }

    /**
     * Set response
     *
     * @param \AppBundle\Entity\Response $response
     *
     * @return UserWatcherRequest
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
