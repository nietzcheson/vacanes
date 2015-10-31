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
     * @param string $filename
     *
     * @return DogPhoto
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set dogs
     *
     * @param \AppBundle\Entity\Dog $dogs
     *
     * @return DogPhoto
     */
    public function setDogs(\AppBundle\Entity\Dog $dogs = null)
    {
        $this->dogs = $dogs;

        return $this;
    }

    /**
     * Get dogs
     *
     * @return \AppBundle\Entity\Dog
     */
    public function getDogs()
    {
        return $this->dogs;
    }
}
