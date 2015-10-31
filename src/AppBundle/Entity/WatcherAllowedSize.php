<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WatcherAllowedSize
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\WatcherAllowedSizesRepository")
 */
class WatcherAllowedSize
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
    * @ORM\ManyToOne(targetEntity="DogSize", inversedBy="watcherAllowedSizes")
    * @ORM\JoinColumn(name="dog_size_id", referencedColumnName="id")
    */
    private $dogSize;

    /**
    * @ORM\ManyToOne(targetEntity="UserWatcher", inversedBy="watcherAllowedSizes")
    * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
    */
    private $userWatcher;

}
