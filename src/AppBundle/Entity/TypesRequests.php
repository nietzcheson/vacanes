<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypesRequests
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TypesRequestsRepository")
 */
class TypesRequests
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
     * @ORM\Column(name="typeRequest", type="string", length=255)
     */
    private $typeRequest;

    /**
     * @ORM\OneToMany(targetEntity="Requests", mappedBy="typesRequest")
     */

    private $requests;


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
     * Set typeRequest
     *
     * @param string $typeRequest
     *
     * @return TypesRequests
     */
    public function setTypeRequest($typeRequest)
    {
        $this->typeRequest = $typeRequest;

        return $this;
    }

    /**
     * Get typeRequest
     *
     * @return string
     */
    public function getTypeRequest()
    {
        return $this->typeRequest;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requests = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add request
     *
     * @param \AppBundle\Entity\Requests $request
     *
     * @return TypesRequests
     */
    public function addRequest(\AppBundle\Entity\Requests $request)
    {
        $this->requests[] = $request;

        return $this;
    }

    /**
     * Remove request
     *
     * @param \AppBundle\Entity\Requests $request
     */
    public function removeRequest(\AppBundle\Entity\Requests $request)
    {
        $this->requests->removeElement($request);
    }

    /**
     * Get requests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequests()
    {
        return $this->requests;
    }
}
