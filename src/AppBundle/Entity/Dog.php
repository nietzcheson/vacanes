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
}
