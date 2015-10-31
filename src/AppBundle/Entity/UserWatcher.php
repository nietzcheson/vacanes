<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserWatcher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserWatchersRepository")
 */
class UserWatcher
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
     * @var string
     *
     * @ORM\Column(name="bios", type="text")
     */
    private $bios;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
    * @ORM\OneToOne(targetEntity="User", inversedBy="userWatcher")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="PlacePhotos", mappedBy="userWatcher", cascade={"persist", "remove"})
     */
    private $placePhotos;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSizes", mappedBy="userWatcher", cascade={"persist", "remove"})
     */
    private $allowedSizes;

    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatchers", mappedBy="userWatchers", cascade={"persist", "remove"})
     */
    private $favoriteWatchers;

    /**
     * @ORM\OneToMany(targetEntity="UserWatcherRequest", mappedBy="userWatcher", cascade={"persist", "remove"})
     */
    private $userWatcherRequests;
    
}
