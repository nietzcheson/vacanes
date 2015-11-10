<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogBreed
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogBreedsRepository")
 */
class DogBreed
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
     * @ORM\Column(name="breed", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Dog", mappedBy="dogBreed")
     */
    private $dogs;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dogs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return DogBreed
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
     * Add dog
     *
     * @param \AppBundle\Entity\Dog $dog
     *
     * @return DogBreed
     */
    public function addDog(\AppBundle\Entity\Dog $dog)
    {
        $this->dogs[] = $dog;

        return $this;
    }

    /**
     * Remove dog
     *
     * @param \AppBundle\Entity\Dog $dog
     */
    public function removeDog(\AppBundle\Entity\Dog $dog)
    {
        $this->dogs->removeElement($dog);
    }

    /**
     * Get dogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDogs()
    {
        return $this->dogs;
    }
}