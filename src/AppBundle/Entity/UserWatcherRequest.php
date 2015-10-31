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
     * @ORM\ManyToOne(targetEntity="UserWatcher", inversedBy="UserWatcherRequests")
     * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
     */
    private $userWatcher;
    
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
}
