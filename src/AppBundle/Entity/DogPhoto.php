<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogPhoto
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogPhotosRepository")
 */
class DogPhoto
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
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
    * @ORM\ManyToOne(targetEntity="Dog", inversedBy="photos")
    * @ORM\JoinColumn(name="dog_id", referencedColumnName="id")
    */
    private $dogs;


}
