<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavoriteWatcher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FavoriteWatchersRepository")
 */
class FavoriteWatcher
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
    * @ORM\ManyToOne(targetEntity="Owner", inversedBy="favoriteWatchers")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    /**
    * @ORM\ManyToOne(targetEntity="UserWatcher", inversedBy="favoriteWatcher")
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
     * Set owner
     *
     * @param \AppBundle\Entity\Owner $owner
     *
     * @return FavoriteWatcher
     */
    public function setOwner(\AppBundle\Entity\Owner $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AppBundle\Entity\Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set userWatcher
     *
     * @param \AppBundle\Entity\UserWatcher $userWatcher
     *
     * @return FavoriteWatcher
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
