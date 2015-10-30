<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavoriteWatchers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FavoriteWatchersRepository")
 */
class FavoriteWatchers
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
     * @var integer
     *
     * @ORM\Column(name="usersOwners", type="integer")
     */
    private $usersOwners;

    /**
     * @var integer
     *
     * @ORM\Column(name="usersWatchers", type="integer")
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
     * Set usersOwners
     *
     * @param integer $usersOwners
     *
     * @return FavoriteWatchers
     */
    public function setUsersOwners($usersOwners)
    {
        $this->usersOwners = $usersOwners;

        return $this;
    }

    /**
     * Get usersOwners
     *
     * @return integer
     */
    public function getUsersOwners()
    {
        return $this->usersOwners;
    }

    /**
     * Set usersWatchers
     *
     * @param integer $usersWatchers
     *
     * @return FavoriteWatchers
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
