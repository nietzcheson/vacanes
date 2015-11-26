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
    * @ORM\ManyToOne(targetEntity="DogSize", inversedBy="watcherAllowedSize")
    * @ORM\JoinColumn(name="dog_size_id", referencedColumnName="id")
    */
    private $dogSize;

    /**
    * @ORM\ManyToOne(targetEntity="Watcher", inversedBy="watcherAllowedSize")
    * @ORM\JoinColumn(name="watcher_id", referencedColumnName="id")
    */
    private $watcher;

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
     * Set dogSize
     *
     * @param \AppBundle\Entity\DogSize $dogSize
     *
     * @return WatcherAllowedSize
     */
    public function setDogSize(\AppBundle\Entity\DogSize $dogSize = null)
    {
        $this->dogSize = $dogSize;

        return $this;
    }

    /**
     * Get dogSize
     *
     * @return \AppBundle\Entity\DogSize
     */
    public function getDogSize()
    {
        return $this->dogSize;
    }

    /**
     * Set watcher
     *
     * @param \AppBundle\Entity\Watcher $watcher
     *
     * @return WatcherAllowedSize
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
}
