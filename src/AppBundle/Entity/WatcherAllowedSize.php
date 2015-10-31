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
     * Set userWatcher
     *
     * @param \AppBundle\Entity\UserWatcher $userWatcher
     *
     * @return WatcherAllowedSize
     */
    public function setUserWatcher(\AppBundle\Entity\UserWatcher $userWatcher = null)
    {
        $this->userWatcher = $userWatcher;

        return $this;
    }

    /**
     * Get userWatcher
     *
     * @return \AppBundle\Entity\UserWatcher
     */
    public function getUserWatcher()
    {
        return $this->userWatcher;
    }
}
