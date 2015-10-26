<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * User
 *
 * @ORM\Table(name="v_dog")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Dog
{
    use ORMBehaviors\Timestampable\Timestampable;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;
    
    /**
     * @var integer
     * 
     * 1 for small, 2 for medium, 3 for big
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;
    
    /**
     * @var \AppBundle\Entity\DogOwner
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DogOwner", inversedBy="dogs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dog_owner_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    private $dogOwner;

    
    /**
     * @var \AppBundle\Entity\DogPhoto
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DogPhoto", mappedBy="category")
     */
    private $photos;
    
    public function __construct() {
        $this->photos = new ArrayCollection();
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
     * Set dogOwner
     *
     * @param \AppBundle\Entity\DogOwner $dogOwner
     *
     * @return Dog
     */
    public function setDogOwner(\AppBundle\Entity\DogOwner $dogOwner)
    {
        $this->dogOwner = $dogOwner;

        return $this;
    }

    /**
     * Get dogOwner
     *
     * @return \AppBundle\Entity\DogOwner
     */
    public function getDogOwner()
    {
        return $this->dogOwner;
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
     * @param integer $size
     *
     * @return Dog
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
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
