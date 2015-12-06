<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * UserWatcher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\WatcherRepository")
 */
class Watcher
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"watcher"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="bios", type="text")
     * @Groups({"watcher"})
     */
    private $bios;

    /**
     * @var float
     *
     * @ORM\Column(name="telephone", type="float")
     * @Groups({"watcher"})
     */
    private $telephone;

    /**
    * @ORM\OneToOne(targetEntity="User", inversedBy="watcher")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="PlacePhoto", mappedBy="watcher", cascade={"persist", "remove"})
     * @Groups({"watcher"})
     */
    private $placePhoto;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSize", mappedBy="watcher", cascade={"persist", "remove"})
     */
    private $watcherAllowedSize;

    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatcher", mappedBy="watcher", cascade={"persist", "remove"})
     */
    private $favoriteWatcher;

    /**
     * @ORM\OneToMany(targetEntity="WatcherRequest", mappedBy="watcher", cascade={"persist", "remove"})
     */
    private $watcherRequest;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->placePhoto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->allowedSizes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->favoriteWatchers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->watcherRequests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set bios
     *
     * @param string $bios
     *
     * @return Watcher
     */
    public function setBios($bios)
    {
        $this->bios = $bios;

        return $this;
    }

    /**
     * Get bios
     *
     * @return string
     */
    public function getBios()
    {
        return $this->bios;
    }

    /**
     * Set telephone
     *
     * @param float $telephone
     *
     * @return Watcher
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return float
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Watcher
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
     * Add placePhoto
     *
     * @param \AppBundle\Entity\PlacePhoto $placePhoto
     *
     * @return Watcher
     */
    public function addPlacePhoto(\AppBundle\Entity\PlacePhoto $placePhoto)
    {
        $this->placePhoto[] = $placePhoto;

        return $this;
    }

    /**
     * Remove placePhoto
     *
     * @param \AppBundle\Entity\PlacePhoto $placePhoto
     */
    public function removePlacePhoto(\AppBundle\Entity\PlacePhoto $placePhoto)
    {
        $this->placePhoto->removeElement($placePhoto);
    }

    /**
     * Get placePhoto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlacePhoto()
    {
        return $this->placePhoto;
    }

    /**
     * Add watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize
     *
     * @return Watcher
     */
    public function addWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize)
    {
        $this->watcherAllowedSize[] = $watcherAllowedSize;

        return $this;
    }

    /**
     * Remove watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize
     */
    public function removeWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize)
    {
        $this->watcherAllowedSize->removeElement($watcherAllowedSize);
    }

    /**
     * Get watcherAllowedSize
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWatcherAllowedSize()
    {
        return $this->watcherAllowedSize;
    }

    /**
     * Add favoriteWatcher
     *
     * @param \AppBundle\Entity\FavoriteWatcher $favoriteWatcher
     *
     * @return Watcher
     */
    public function addFavoriteWatcher(\AppBundle\Entity\FavoriteWatcher $favoriteWatcher)
    {
        $this->favoriteWatcher[] = $favoriteWatcher;

        return $this;
    }

    /**
     * Remove favoriteWatcher
     *
     * @param \AppBundle\Entity\FavoriteWatcher $favoriteWatcher
     */
    public function removeFavoriteWatcher(\AppBundle\Entity\FavoriteWatcher $favoriteWatcher)
    {
        $this->favoriteWatcher->removeElement($favoriteWatcher);
    }

    /**
     * Get favoriteWatcher
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFavoriteWatcher()
    {
        return $this->favoriteWatcher;
    }

    /**
     * Add watcherRequest
     *
     * @param \AppBundle\Entity\WatcherRequest $watcherRequest
     *
     * @return Watcher
     */
    public function addWatcherRequest(\AppBundle\Entity\WatcherRequest $watcherRequest)
    {
        $this->watcherRequest[] = $watcherRequest;

        return $this;
    }

    /**
     * Remove watcherRequest
     *
     * @param \AppBundle\Entity\WatcherRequest $watcherRequest
     */
    public function removeWatcherRequest(\AppBundle\Entity\WatcherRequest $watcherRequest)
    {
        $this->watcherRequest->removeElement($watcherRequest);
    }

    /**
     * Get watcherRequest
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWatcherRequest()
    {
        return $this->watcherRequest;
    }
}
