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
    * @ORM\ManyToOne(targetEntity="UserOwner", inversedBy="favoriteWatchers")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $userOwner;

    /**
    * @ORM\ManyToOne(targetEntity="UserWatcher", inversedBy="favoriteWatchers")
    * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
    */
    private $userWatcher;   
}
