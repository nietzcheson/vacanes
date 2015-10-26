<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * DogPhoto
 *
 * @ORM\Table(name="v_dog_photo")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogPhotoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class DogPhoto
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
     * @ORM\Column(name="filename", type="string", length=255, nullable=false)
     */
    private $filename;
    
    
    /**
     * @var \AppBundle\Entity\Dog
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dog", inversedBy="photos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dog_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    private $dog;

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
     * Set filename
     *
     * @param string $filename
     *
     * @return DogPhoto
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set dog
     *
     * @param \AppBundle\Entity\Dog $dog
     *
     * @return DogPhoto
     */
    public function setDog(\AppBundle\Entity\Dog $dog)
    {
        $this->dog = $dog;

        return $this;
    }

    /**
     * Get dog
     *
     * @return \AppBundle\Entity\Dog
     */
    public function getDog()
    {
        return $this->dog;
    }
}
