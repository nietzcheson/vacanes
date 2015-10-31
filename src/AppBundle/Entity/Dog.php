<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
    * @ORM\ManyToOne(targetEntity="DogSize", inversedBy="dogs")
    * @ORM\JoinColumn(name="size_type_id", referencedColumnName="id")
    */
    private $size;

    /**
    * @ORM\ManyToOne(targetEntity="DogBreed", inversedBy="dogs")
    * @ORM\JoinColumn(name="dog_breed_id", referencedColumnName="id")
    */
    private $breed;

    /**
    * @ORM\ManyToOne(targetEntity="UserOwner", inversedBy="dogs")
    * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id")
    */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="DogPhoto", mappedBy="dogs", cascade={"persist", "remove"})
     */
    private $photos;
}
