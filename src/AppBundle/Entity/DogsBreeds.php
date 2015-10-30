<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogsBreed
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogsBreedsRepository")
 */
class DogsBreeds
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
    private $breed;

    /**
     * @ORM\OneToMany(targetEntity="Dogs", mappedBy="dogsBreeds")
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
     * Set breed
     *
     * @param string $breed
     *
     * @return DogsBreed
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string
     */
    public function getBreed()
    {
        return $this->breed;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dog
     *
     * @param \AppBundle\Entity\Dogs $dog
     *
     * @return DogsBreeds
     */
    public function addDog(\AppBundle\Entity\Dogs $dog)
    {
        $this->dogs[] = $dog;

        return $this;
    }

    /**
     * Remove dog
     *
     * @param \AppBundle\Entity\Dogs $dog
     */
    public function removeDog(\AppBundle\Entity\Dogs $dog)
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
