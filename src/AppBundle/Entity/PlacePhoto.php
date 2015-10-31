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
}
