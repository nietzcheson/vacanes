<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersWatchers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UsersWatchersRepository")
 */
class UsersWatchers
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
    * @ORM\OneToOne(targetEntity="Users", inversedBy="usersWatchers")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="PlacePhotos", mappedBy="usersWatchers", cascade={"persist", "remove"})
     */

    private $placePhotos;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSizes", mappedBy="usersWatchers", cascade={"persist", "remove"})
     */

    private $watcherAllowedSizes;

    /**
     * @ORM\OneToMany(targetEntity="Responses", mappedBy="usersWatchers", cascade={"persist", "remove"})
     */

    private $responses;

    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatchers", mappedBy="usersWatchers", , cascade={"persist", "remove"})
     */

    private $favoritesWatchers;

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
     * @return UsersWatchers
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
     * @param integer $telephone
     *
     * @return UsersWatchers
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set users
     *
     * @param integer $users
     *
     * @return UsersWatchers
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return integer
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->placePhotos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->watcherAllowedSizes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->responses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add placePhoto
     *
     * @param \AppBundle\Entity\PlacePhotos $placePhoto
     *
     * @return UsersWatchers
     */
    public function addPlacePhoto(\AppBundle\Entity\PlacePhotos $placePhoto)
    {
        $this->placePhotos[] = $placePhoto;

        return $this;
    }

    /**
     * Remove placePhoto
     *
     * @param \AppBundle\Entity\PlacePhotos $placePhoto
     */
    public function removePlacePhoto(\AppBundle\Entity\PlacePhotos $placePhoto)
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
     * Add watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize
     *
     * @return UsersWatchers
     */
    public function addWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize)
    {
        $this->watcherAllowedSizes[] = $watcherAllowedSize;

        return $this;
    }

    /**
     * Remove watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize
     */
    public function removeWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize)
    {
        $this->watcherAllowedSizes->removeElement($watcherAllowedSize);
    }

    /**
     * Get watcherAllowedSizes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWatcherAllowedSizes()
    {
        return $this->watcherAllowedSizes;
    }

    /**
     * Add response
     *
     * @param \AppBundle\Entity\Responses $response
     *
     * @return UsersWatchers
     */
    public function addResponse(\AppBundle\Entity\Responses $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \AppBundle\Entity\Responses $response
     */
    public function removeResponse(\AppBundle\Entity\Responses $response)
    {
        $this->responses->removeElement($response);
    }

    /**
     * Get responses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponses()
    {
        return $this->responses;
    }
}
