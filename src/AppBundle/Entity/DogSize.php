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
     * @ORM\OneToMany(targetEntity="Dogs", mappedBy="sizesTypes")
     */

    private $dogs;
}
