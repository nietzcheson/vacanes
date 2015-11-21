<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"dog"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Groups({"dog"})
     */
    private $name;

    /**
    * @ORM\ManyToOne(targetEntity="DogSize", inversedBy="dog")
    * @ORM\JoinColumn(name="size_type_id", referencedColumnName="id")
    * @Groups({"dog"})
    */
    private $dogSize;

    /**
    * @ORM\ManyToOne(targetEntity="DogBreed", inversedBy="dog")
    * @ORM\JoinColumn(name="dog_breed_id", referencedColumnName="id")
    * @Groups({"dog"})
    */
    private $dogBreed;

    /**
    * @ORM\ManyToOne(targetEntity="Owner", inversedBy="dogs")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="DogPhoto", mappedBy="dog", cascade={"persist", "remove"})
     */
    private $dogPhoto;
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
     * Set dogSize
     *
     * @param \AppBundle\Entity\DogSize $dogSize
     *
     * @return Dog
     */
    public function setDogSize(\AppBundle\Entity\DogSize $dogSize = null)
    {
        $this->dogSize = $dogSize;

        return $this;
    }

    /**
     * Get dogSize
     *
     * @return \AppBundle\Entity\DogSize
     */
    public function getDogSize()
    {
        return $this->dogSize;
    }

    /**
     * Set dogBreed
     *
     * @param \AppBundle\Entity\DogBreed $dogBreed
     *
     * @return Dog
     */
    public function setDogBreed(\AppBundle\Entity\DogBreed $dogBreed = null)
    {
        $this->dogBreed = $dogBreed;

        return $this;
    }

    /**
     * Get dogBreed
     *
     * @return \AppBundle\Entity\DogBreed
     */
    public function getDogBreed()
    {
        return $this->dogBreed;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\Owner $owner
     *
     * @return Dog
     */
    public function setOwner(\AppBundle\Entity\Owner $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AppBundle\Entity\Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add dogPhoto
     *
     * @param \AppBundle\Entity\DogPhoto $dogPhoto
     *
     * @return Dog
     */
    public function addDogPhoto(\AppBundle\Entity\DogPhoto $dogPhoto)
    {
        $this->dogPhoto[] = $dogPhoto;

        return $this;
    }

    /**
     * Remove dogPhoto
     *
     * @param \AppBundle\Entity\DogPhoto $dogPhoto
     */
    public function removeDogPhoto(\AppBundle\Entity\DogPhoto $dogPhoto)
    {
        $this->dogPhoto->removeElement($dogPhoto);
    }

    /**
     * Get dogPhoto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDogPhoto()
    {
        return $this->dogPhoto;
    }
}
