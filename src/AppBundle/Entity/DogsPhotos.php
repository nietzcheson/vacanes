<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogsPhotos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogsPhotosRepository")
 */
class DogsPhotos
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
     * @ORM\Column(name="fileName", type="string", length=255)
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
    * @ORM\ManyToOne(targetEntity="Dogs", inversedBy="dogsPhotos")
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
     * Set fileName
     *
     * @param string $fileName
     *
     * @return DogsPhotos
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return DogsPhotos
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set dogs
     *
     * @param integer $dogs
     *
     * @return DogsPhotos
     */
    public function setDogs($dogs)
    {
        $this->dogs = $dogs;

        return $this;
    }

    /**
     * Get dogs
     *
     * @return integer
     */
    public function getDogs()
    {
        return $this->dogs;
    }
}
