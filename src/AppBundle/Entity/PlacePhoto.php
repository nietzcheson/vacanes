<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlacePhoto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PlacePhotosRepository")
 */
class PlacePhoto
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
     * @ORM\Column(name="filename", type="integer")
     */
    private $filename;

    /**
    * @ORM\ManyToOne(targetEntity="UserWatcher", inversedBy="placePhotos")
    * @ORM\JoinColumn(name="user_watcher_id", referencedColumnName="id")
    */
    private $usersWatcher;

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
     * Set filename
     *
     * @param integer $filename
     *
     * @return PlacePhoto
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return integer
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set usersWatcher
     *
     * @param \AppBundle\Entity\UserWatcher $usersWatcher
     *
     * @return PlacePhoto
     */
    public function setUsersWatcher(\AppBundle\Entity\UserWatcher $usersWatcher = null)
    {
        $this->usersWatcher = $usersWatcher;

        return $this;
    }

    /**
     * Get usersWatcher
     *
     * @return \AppBundle\Entity\UserWatcher
     */
    public function getUsersWatcher()
    {
        return $this->usersWatcher;
    }
}
