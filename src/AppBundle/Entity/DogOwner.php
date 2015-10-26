<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * DogOwner
 *
 * @ORM\Table(name="v_dog_owner")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DogOwnerRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class DogOwner
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
     *
     * @var string
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     *
     */
    private $address;
    
	/**
	 *
	 * @var decimal
	 * @ORM\Column(name="latitude", type="decimal", precision=11, scale=8, nullable=false)
	 */
	private $latitude;
	
	/**
	 *
	 * @var decimal
	 * @ORM\Column(name="longitude", type="decimal", precision=11, scale=8, nullable=false)
	 */
	private $longitude;
    
	
	/**
	 * @var \AppBundle\Entity\Dog
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Dog", mappedBy="dogOwner")
	 */
	private $dogs;
	
	public function __construct() {
	    $this->$dogs = new ArrayCollection();
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
     * Set address
     *
     * @param string $address
     *
     * @return DogOwner
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return DogOwner
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return DogOwner
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Add dog
     *
     * @param \AppBundle\Entity\Dog $dog
     *
     * @return DogOwner
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
