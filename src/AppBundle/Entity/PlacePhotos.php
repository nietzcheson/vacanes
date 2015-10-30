<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlacePhotos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PlacesPhotosRepository")
 */
class PlacesPhotos
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
     * @ORM\Column(name="fileName", type="integer")
     */
    private $fileName;

    /**
    * @ORM\ManyToOne(targetEntity="UsersWatchers", inversedBy="placesPhotos")
    * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
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
     * Set fileName
     *
     * @param integer $fileName
     *
     * @return PlacePhotos
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return integer
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set usersWatchers
     *
     * @param integer $usersWatchers
     *
     * @return PlacePhotos
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
