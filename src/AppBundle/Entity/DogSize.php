<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogSize
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogSizesRepository")
 */
class DogSize
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
     * @var integer
     *
     * @ORM\Column(name="name", type="integer")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSize", mappedBy="sizeType")
     */
    private $watcherAllowedSizes;

    /**
     * @ORM\OneToMany(targetEntity="Dog", mappedBy="sizesTypes")
     */

    private $dogs;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->watcherAllowedSizes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param integer $name
     *
     * @return DogSize
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize
     *
     * @return DogSize
     */
    public function addWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize)
    {
        $this->watcherAllowedSizes[] = $watcherAllowedSize;

        return $this;
    }

    /**
     * Remove watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize
     */
    public function removeWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize)
    {
        $this->watcherAllowedSizes->removeElement($watcherAllowedSize);
    }

    /**
     * Get watcherAllowedSizes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWatcherAllowedSizes()
    {
        return $this->watcherAllowedSizes;
    }

    /**
     * Add dog
     *
     * @param \AppBundle\Entity\Dog $dog
     *
     * @return DogSize
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
