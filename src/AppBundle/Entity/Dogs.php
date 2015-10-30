<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dogs
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogsRepository")
 */
class Dogs
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
     * @ORM\Column(name="dogName", type="string", length=255)
     */
    private $dogName;

    /**
    * @ORM\ManyToOne(targetEntity="SizesTypes", inversedBy="dogs")
    * @ORM\JoinColumn(name="size_type_id", referencedColumnName="id")
    */
    private $sizesTypes;

    /**
    * @ORM\ManyToOne(targetEntity="DogsBreeds", inversedBy="dogs")
    * @ORM\JoinColumn(name="dog_bred_id", referencedColumnName="id")
    */
    private $dogsBreeds;

    /**
    * @ORM\ManyToOne(targetEntity="UsersOwners", inversedBy="dogs")
    * @ORM\JoinColumn(name="user_owners_id", referencedColumnName="id")
    */
    private $usersOwners;

    /**
     * @ORM\OneToMany(targetEntity="DogsPhotos", mappedBy="dogs", cascade={"persist", "remove"})
     */

    private $dogsPhotos;

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
     * Set dogName
     *
     * @param string $dogName
     *
     * @return Dogs
     */
    public function setDogName($dogName)
    {
        $this->dogName = $dogName;

        return $this;
    }

    /**
     * Get dogName
     *
     * @return string
     */
    public function getDogName()
    {
        return $this->dogName;
    }

    /**
     * Set sizesTypes
     *
     * @param integer $sizesTypes
     *
     * @return Dogs
     */
    public function setSizesTypes($sizesTypes)
    {
        $this->sizesTypes = $sizesTypes;

        return $this;
    }

    /**
     * Get sizesTypes
     *
     * @return integer
     */
    public function getSizesTypes()
    {
        return $this->sizesTypes;
    }

    /**
     * Set dogBreeds
     *
     * @param integer $dogBreeds
     *
     * @return Dogs
     */
    public function setDogBreeds($dogBreeds)
    {
        $this->dogBreeds = $dogBreeds;

        return $this;
    }

    /**
     * Get dogBreeds
     *
     * @return integer
     */
    public function getDogBreeds()
    {
        return $this->dogBreeds;
    }

    /**
     * Set usersOwners
     *
     * @param integer $usersOwners
     *
     * @return Dogs
     */
    public function setUsersOwners($usersOwners)
    {
        $this->usersOwners = $usersOwners;

        return $this;
    }

    /**
     * Get usersOwners
     *
     * @return integer
     */
    public function getUsersOwners()
    {
        return $this->usersOwners;
    }

    /**
     * Set dogsBreeds
     *
     * @param \AppBundle\Entity\DogsBreeds $dogsBreeds
     *
     * @return Dogs
     */
    public function setDogsBreeds(\AppBundle\Entity\DogsBreeds $dogsBreeds = null)
    {
        $this->dogsBreeds = $dogsBreeds;

        return $this;
    }

    /**
     * Get dogsBreeds
     *
     * @return \AppBundle\Entity\DogsBreeds
     */
    public function getDogsBreeds()
    {
        return $this->dogsBreeds;
    }
}
