<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="breed", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Dog", mappedBy="dogBreed")
     */
    private $dogs;
}
