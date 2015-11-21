<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"requestType"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Groups({"requestType"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Groups({"requestType"})
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Request", mappedBy="requestType")
     */
    private $request;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20)
     * @Groups({"requestType"})
     */
    private $type;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return RequestType
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
     * Set description
     *
     * @param string $description
     *
     * @return RequestType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add request
     *
     * @param \AppBundle\Entity\Request $request
     *
     * @return RequestType
     */
    public function addRequest(\AppBundle\Entity\Request $request)
    {
        $this->request[] = $request;

        return $this;
    }

    /**
     * Remove request
     *
     * @param \AppBundle\Entity\Request $request
     */
    public function removeRequest(\AppBundle\Entity\Request $request)
    {
        $this->request->removeElement($request);
    }

    /**
     * Get request
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return RequestType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
