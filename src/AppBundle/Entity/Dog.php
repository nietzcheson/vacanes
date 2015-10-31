<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dog
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogsRepository")
 */
class Dog
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
    * @ORM\ManyToOne(targetEntity="DogSize", inversedBy="dogs")
    * @ORM\JoinColumn(name="size_type_id", referencedColumnName="id")
    */
    private $size;

    /**
    * @ORM\ManyToOne(targetEntity="DogBreed", inversedBy="dogs")
    * @ORM\JoinColumn(name="dog_breed_id", referencedColumnName="id")
    */
    private $breed;

    /**
    * @ORM\ManyToOne(targetEntity="UserOwner", inversedBy="dogs")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="DogPhoto", mappedBy="dogs", cascade={"persist", "remove"})
     */
    private $photos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Dog
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set size
     *
     * @param \AppBundle\Entity\DogSize $size
     *
     * @return Dog
     */
    public function setSize(\AppBundle\Entity\DogSize $size = null)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return \AppBundle\Entity\DogSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set breed
     *
     * @param \AppBundle\Entity\DogBreed $breed
     *
     * @return Dog
     */
    public function setBreed(\AppBundle\Entity\DogBreed $breed = null)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return \AppBundle\Entity\DogBreed
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\UserOwner $owner
     *
     * @return Dog
     */
    public function setOwner(\AppBundle\Entity\UserOwner $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AppBundle\Entity\UserOwner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add photo
     *
     * @param \AppBundle\Entity\DogPhoto $photo
     *
     * @return Dog
     */
    public function addPhoto(\AppBundle\Entity\DogPhoto $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \AppBundle\Entity\DogPhoto $photo
     */
    public function removePhoto(\AppBundle\Entity\DogPhoto $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
