<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
    * @ORM\OneToOne(targetEntity="User", inversedBy="userWatcher")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="PlacePhoto", mappedBy="userWatcher", cascade={"persist", "remove"})
     * @Groups({"watcher"})
     */
    private $placePhotos;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSize", mappedBy="userWatcher", cascade={"persist", "remove"})
     */
    private $watcherAllowedSize;

    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatcher", mappedBy="userWatcher", cascade={"persist", "remove"})
     */
    private $favoriteWatcher;

    /**
     * @ORM\OneToMany(targetEntity="UserWatcherRequest", mappedBy="userWatcher", cascade={"persist", "remove"})
     */
    private $userWatcherRequests;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->placePhotos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->allowedSizes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->favoriteWatchers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userWatcherRequests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return UserWatcher
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
     * @return UserWatcher
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
     * @return UserWatcher
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
     * @return UserWatcher
     */
    public function addPlacePhoto(\AppBundle\Entity\PlacePhoto $placePhoto)
    {
        $this->placePhotos[] = $placePhoto;

        return $this;
    }

    /**
     * Remove placePhoto
     *
     * @param \AppBundle\Entity\PlacePhoto $placePhoto
     */
    public function removePlacePhoto(\AppBundle\Entity\PlacePhoto $placePhoto)
    {
        $this->placePhotos->removeElement($placePhoto);
    }

    /**
     * Get placePhotos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlacePhotos()
    {
        return $this->placePhotos;
    }

    /**
     * Add allowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $allowedSize
     *
     * @return UserWatcher
     */
    public function addAllowedSize(\AppBundle\Entity\WatcherAllowedSize $allowedSize)
    {
        $this->allowedSizes[] = $allowedSize;

        return $this;
    }

    /**
     * Remove allowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $allowedSize
     */
    public function removeAllowedSize(\AppBundle\Entity\WatcherAllowedSize $allowedSize)
    {
        $this->allowedSizes->removeElement($allowedSize);
    }

    /**
     * Get allowedSizes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAllowedSizes()
    {
        return $this->allowedSizes;
    }

    /**
     * Add favoriteWatcher
     *
     * @param \AppBundle\Entity\FavoriteWatcher $favoriteWatcher
     *
     * @return UserWatcher
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

    /**
     * Add userWatcherRequest
     *
     * @param \AppBundle\Entity\UserWatcherRequest $userWatcherRequest
     *
     * @return UserWatcher
     */
    public function addUserWatcherRequest(\AppBundle\Entity\UserWatcherRequest $userWatcherRequest)
    {
        $this->userWatcherRequests[] = $userWatcherRequest;

        return $this;
    }

    /**
     * Remove userWatcherRequest
     *
     * @param \AppBundle\Entity\UserWatcherRequest $userWatcherRequest
     */
    public function removeUserWatcherRequest(\AppBundle\Entity\UserWatcherRequest $userWatcherRequest)
    {
        $this->userWatcherRequests->removeElement($userWatcherRequest);
    }

    /**
     * Get userWatcherRequests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserWatcherRequests()
    {
        return $this->userWatcherRequests;
    }

    /**
     * Add watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize
     *
     * @return UserWatcher
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
     * Get favoriteWatcher
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFavoriteWatcher()
    {
        return $this->favoriteWatcher;
    }
}
