<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WatcherAllowedSizes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\WatcherAllowedSizesRepository")
 */
class WatcherAllowedSizes
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
    * @ORM\ManyToOne(targetEntity="SizesTypes", inversedBy="watcherAllowedSizes")
    * @ORM\JoinColumn(name="size_type_id", referencedColumnName="id")
    */
    private $sizesTypes;

    /**
    * @ORM\ManyToOne(targetEntity="UsersWatchers", inversedBy="watcherAllowedSizes")
    * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
    */
    private $usersWatchers;

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
     * Set sizesTypes
     *
     * @param integer $sizesTypes
     *
     * @return WatcherAllowedSizes
     */
    public function setSizesTypes($sizesTypes)
    {
        $this->sizesTypes = $sizesTypes;

        return $this;
    }

    /**
     * Get sizesTypes
     *
     * @return integer
     */
    public function getSizesTypes()
    {
        return $this->sizesTypes;
    }

    /**
     * Set usersWatchers
     *
     * @param integer $usersWatchers
     *
     * @return WatcherAllowedSizes
     */
    public function setUsersWatchers($usersWatchers)
    {
        $this->usersWatchers = $usersWatchers;

        return $this;
    }

    /**
     * Get usersWatchers
     *
     * @return integer
     */
    public function getUsersWatchers()
    {
        return $this->usersWatchers;
    }
}
