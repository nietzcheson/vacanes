<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestTypesRepository")
 */
class RequestType
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
     * @ORM\OneToMany(targetEntity="Requests", mappedBy="type")
     */
    private $requests;

}
