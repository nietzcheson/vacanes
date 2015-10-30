<?php

namespace AppBundle\Entity;

/**
 * PlacesPhotos
 */
class PlacesPhotos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $fileName;

    /**
     * @var \AppBundle\Entity\UsersWatchers
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
     * @return PlacesPhotos
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
     * @param \AppBundle\Entity\UsersWatchers $usersWatchers
     *
     * @return PlacesPhotos
     */
    public function setUsersWatchers(\AppBundle\Entity\UsersWatchers $usersWatchers = null)
    {
        $this->usersWatchers = $usersWatchers;

        return $this;
    }

    /**
     * Get usersWatchers
     *
     * @return \AppBundle\Entity\UsersWatchers
     */
    public function getUsersWatchers()
    {
        return $this->usersWatchers;
    }
}

