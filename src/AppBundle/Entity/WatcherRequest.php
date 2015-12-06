<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * UserWatcherRequest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\WatcherRequestRepository")
 */
class WatcherRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"watcherRequest"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Request", inversedBy="watcherRequest")
     * @ORM\JoinColumn(name="request_id", referencedColumnName="id")
      * @Groups({"watcherRequest"})
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
     * @Groups({"watcherRequest"})
     */
    private $viewed;

    /**
     * @ORM\OneToOne(targetEntity="Response", mappedBy="watcherRequest", cascade={"persist", "remove"})
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
     * @return WatcherRequest
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
     * @return WatcherRequest
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
     * @return WatcherRequest
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
     * @return WatcherRequest
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
