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
}
