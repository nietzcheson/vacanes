<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserOwner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserOwnersRepository")
 */
class UserOwner
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;

    /**
    * @ORM\OneToOne(targetEntity="User", inversedBy="userOwner")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    //TODO: ManyToMany Relation
    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatcher", mappedBy="usersOwners", cascade={"persist", "remove"})
     */
    private $favoriteWatchers;

}
