<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"userOwner"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Groups({"userOwner"})
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     * @Groups({"userOwner"})
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     * @Groups({"userOwner"})
     */
    private $longitude;

    /**
    * @ORM\OneToOne(targetEntity="User", inversedBy="userOwner")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    //TODO: ManyToMany Relation
    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatcher", mappedBy="userOwner", cascade={"persist", "remove"})
     */
    private $favoriteWatchers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->favoriteWatchers = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set address
     *
     * @param string $address
     *
     * @return UserOwner
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return UserOwner
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return UserOwner
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return UserOwner
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add favoriteWatcher
     *
     * @param \AppBundle\Entity\FavoriteWatcher $favoriteWatcher
     *
     * @return UserOwner
     */
    public function addFavoriteWatcher(\AppBundle\Entity\FavoriteWatcher $favoriteWatcher)
    {
        $this->favoriteWatchers[] = $favoriteWatcher;

        return $this;
    }

    /**
     * Remove favoriteWatcher
     *
     * @param \AppBundle\Entity\FavoriteWatcher $favoriteWatcher
     */
    public function removeFavoriteWatcher(\AppBundle\Entity\FavoriteWatcher $favoriteWatcher)
    {
        $this->favoriteWatchers->removeElement($favoriteWatcher);
    }

    /**
     * Get favoriteWatchers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFavoriteWatchers()
    {
        return $this->favoriteWatchers;
    }
}
