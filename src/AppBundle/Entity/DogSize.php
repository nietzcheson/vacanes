<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"dogSize"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @Groups({"dogSize"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSize", mappedBy="dogSize")
     */
    private $watcherAllowedSize;

    /**
     * @ORM\OneToMany(targetEntity="Dog", mappedBy="dogSize")
     */

    private $dog;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->watcherAllowedSize = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return string
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
        $this->watcherAllowedSize[] = $watcherAllowedSize;

        return $this;
    }

    /**
     * Remove watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize
     */
    public function removeWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSize $watcherAllowedSize)
    {
        $this->watcherAllowedSize->removeElement($watcherAllowedSize);
    }

    /**
     * Get watcherAllowedSize
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWatcherAllowedSize()
    {
        return $this->watcherAllowedSize;
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
