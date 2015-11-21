<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"dogBreed"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="breed", type="string", length=255)
     * @Groups({"dogBreed"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Dog", mappedBy="dogBreed")
     */
    private $dog;
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
        $this->dog[] = $dog;

        return $this;
    }

    /**
     * Remove dog
     *
     * @param \AppBundle\Entity\Dog $dog
     */
    public function removeDog(\AppBundle\Entity\Dog $dog)
    {
        $this->dog->removeElement($dog);
    }

    /**
     * Get dog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDog()
    {
        return $this->dog;
    }
}
