<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requests
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RequestsRepository")
 */
class Requests
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
    * @ORM\ManyToOne(targetEntity="TypesRequests", inversedBy="requests")
    * @ORM\JoinColumn(name="type_request_id", referencedColumnName="id")
    */
    private $typesRequests;

    /**
     * @var integer
     *
     * @ORM\Column(name="usersOwners", type="integer")
     */
    private $usersOwners;

    /**
     * @ORM\OneToMany(targetEntity="Responses", mappedBy="requests", cascade={"persist", "remove"})
     */

    private $responses;

    /**
     * @ORM\OneToMany(targetEntity="RequestsDay", mappedBy="requests", cascade={"persist", "remove"})
     */

    private $requestsDay;

    /**
     * @ORM\OneToMany(targetEntity="RequestsNight", mappedBy="requests", cascade={"persist", "remove"})
     */

    private $requestsNight;

    /**
     * @ORM\OneToMany(targetEntity="RequestsPetVale", mappedBy="requests", cascade={"persist", "remove"})
     */

    private $requestsPetVale;

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
     * @return Requests
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
     * Set typesRequests
     *
     * @param integer $typesRequests
     *
     * @return Requests
     */
    public function setTypesRequests($typesRequests)
    {
        $this->typesRequests = $typesRequests;

        return $this;
    }

    /**
     * Get typesRequests
     *
     * @return integer
     */
    public function getTypesRequests()
    {
        return $this->typesRequests;
    }

    /**
     * Set usersOwners
     *
     * @param integer $usersOwners
     *
     * @return Requests
     */
    public function setUsersOwners($usersOwners)
    {
        $this->usersOwners = $usersOwners;

        return $this;
    }

    /**
     * Get usersOwners
     *
     * @return integer
     */
    public function getUsersOwners()
    {
        return $this->usersOwners;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requestsDay = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requestsNight = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requestsPetVale = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add response
     *
     * @param \AppBundle\Entity\Responses $response
     *
     * @return Requests
     */
    public function addResponse(\AppBundle\Entity\Responses $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \AppBundle\Entity\Responses $response
     */
    public function removeResponse(\AppBundle\Entity\Responses $response)
    {
        $this->responses->removeElement($response);
    }

    /**
     * Get responses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Add requestsDay
     *
     * @param \AppBundle\Entity\RequestsDay $requestsDay
     *
     * @return Requests
     */
    public function addRequestsDay(\AppBundle\Entity\RequestsDay $requestsDay)
    {
        $this->requestsDay[] = $requestsDay;

        return $this;
    }

    /**
     * Remove requestsDay
     *
     * @param \AppBundle\Entity\RequestsDay $requestsDay
     */
    public function removeRequestsDay(\AppBundle\Entity\RequestsDay $requestsDay)
    {
        $this->requestsDay->removeElement($requestsDay);
    }

    /**
     * Get requestsDay
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestsDay()
    {
        return $this->requestsDay;
    }

    /**
     * Add requestsNight
     *
     * @param \AppBundle\Entity\RequestsNight $requestsNight
     *
     * @return Requests
     */
    public function addRequestsNight(\AppBundle\Entity\RequestsNight $requestsNight)
    {
        $this->requestsNight[] = $requestsNight;

        return $this;
    }

    /**
     * Remove requestsNight
     *
     * @param \AppBundle\Entity\RequestsNight $requestsNight
     */
    public function removeRequestsNight(\AppBundle\Entity\RequestsNight $requestsNight)
    {
        $this->requestsNight->removeElement($requestsNight);
    }

    /**
     * Get requestsNight
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestsNight()
    {
        return $this->requestsNight;
    }

    /**
     * Add requestsPetVale
     *
     * @param \AppBundle\Entity\RequestsPetVale $requestsPetVale
     *
     * @return Requests
     */
    public function addRequestsPetVale(\AppBundle\Entity\RequestsPetVale $requestsPetVale)
    {
        $this->requestsPetVale[] = $requestsPetVale;

        return $this;
    }

    /**
     * Remove requestsPetVale
     *
     * @param \AppBundle\Entity\RequestsPetVale $requestsPetVale
     */
    public function removeRequestsPetVale(\AppBundle\Entity\RequestsPetVale $requestsPetVale)
    {
        $this->requestsPetVale->removeElement($requestsPetVale);
    }

    /**
     * Get requestsPetVale
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestsPetVale()
    {
        return $this->requestsPetVale;
    }
}
