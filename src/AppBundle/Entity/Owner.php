<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * UserOwner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OwnerRepository")
 */
class Owner
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"owner"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Groups({"owner"})
     */
    private $address;

    /**
    * @ORM\OneToOne(targetEntity="User", inversedBy="owner")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    * @Groups({"owner"})
    */
    private $user;

    //TODO: ManyToMany Relation
    /**
     * @ORM\OneToMany(targetEntity="FavoriteWatcher", mappedBy="owner", cascade={"persist", "remove"})
     */
    private $favoriteWatchers;

    /**
     * @ORM\OneToMany(targetEntity="Request", mappedBy="owner")
     */

    private $request;

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

    /**
     * Add request
     *
     * @param \AppBundle\Entity\Request $request
     *
     * @return Owner
     */
    public function addRequest(\AppBundle\Entity\Request $request)
    {
        $this->request[] = $request;

        return $this;
    }

    /**
     * Remove request
     *
     * @param \AppBundle\Entity\Request $request
     */
    public function removeRequest(\AppBundle\Entity\Request $request)
    {
        $this->request->removeElement($request);
    }

    /**
     * Get request
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequest()
    {
        return $this->request;
    }
}
