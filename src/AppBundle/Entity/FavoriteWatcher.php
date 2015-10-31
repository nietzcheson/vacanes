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
    * @ORM\ManyToOne(targetEntity="UserOwner", inversedBy="favoriteWatchers")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $userOwner;

    /**
    * @ORM\ManyToOne(targetEntity="UserWatcher", inversedBy="favoriteWatchers")
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
     * Set userOwner
     *
     * @param \AppBundle\Entity\UserOwner $userOwner
     *
     * @return FavoriteWatcher
     */
    public function setUserOwner(\AppBundle\Entity\UserOwner $userOwner = null)
    {
        $this->userOwner = $userOwner;

        return $this;
    }

    /**
     * Get userOwner
     *
     * @return \AppBundle\Entity\UserOwner
     */
    public function getUserOwner()
    {
        return $this->userOwner;
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
