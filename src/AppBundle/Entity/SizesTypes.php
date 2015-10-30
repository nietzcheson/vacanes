<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SizesTypes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SizesTypesRepository")
 */
class SizesTypes
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
     * @ORM\Column(name="sizeType", type="integer")
     */
    private $sizeType;

    /**
     * @ORM\OneToMany(targetEntity="WatcherAllowedSizes", mappedBy="sizesTypes")
     */

    private $watcherAllowedSizes;

    /**
     * @ORM\OneToMany(targetEntity="Dogs", mappedBy="sizesTypes")
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
     * Set sizeType
     *
     * @param integer $sizeType
     *
     * @return SizesTypes
     */
    public function setSizeType($sizeType)
    {
        $this->sizeType = $sizeType;

        return $this;
    }

    /**
     * Get sizeType
     *
     * @return integer
     */
    public function getSizeType()
    {
        return $this->sizeType;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->watcherAllowedSizes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize
     *
     * @return SizesTypes
     */
    public function addWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize)
    {
        $this->watcherAllowedSizes[] = $watcherAllowedSize;

        return $this;
    }

    /**
     * Remove watcherAllowedSize
     *
     * @param \AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize
     */
    public function removeWatcherAllowedSize(\AppBundle\Entity\WatcherAllowedSizes $watcherAllowedSize)
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
     * @param \AppBundle\Entity\Dogs $dog
     *
     * @return SizesTypes
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
