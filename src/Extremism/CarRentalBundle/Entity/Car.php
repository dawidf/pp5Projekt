<?php

namespace Extremism\CarRentalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Extremism\CarRentalBundle\Entity\CarOrder;
use Extremism\CarRentalBundle\Entity\Reservation;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="Extremism\CarRentalBundle\Repository\CarRepository")
 */
class Car
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, unique=true)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="segment", type="string", length=60)
     */
    private $segment;
    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;
    /**
     * @ORM\Column(type="date", name="start_reservation_at", nullable=true)
     */
    private $startReservationAt;
    /**
     * @ORM\Column(type="datetime", name="end_reservation_at", nullable=true)
     */
    private $endReservationAt;
    /**
     * @ORM\Column(type="date", name="end_rent_at")
     */
    private $endRentAt;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    /**
     * @ORM\OneToMany(targetEntity="Extremism\CarRentalBundle\Entity\CarOrder", mappedBy="cars")
     */
    private $carOrder;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carOrder = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Car
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
     * Set segment
     *
     * @param string $segment
     *
     * @return Car
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;

        return $this;
    }

    /**
     * Get segment
     *
     * @return string
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set startReservationAt
     *
     * @param \DateTime $startReservationAt
     *
     * @return Car
     */
    public function setStartReservationAt($startReservationAt)
    {
        $this->startReservationAt = $startReservationAt;

        return $this;
    }

    /**
     * Get startReservationAt
     *
     * @return \DateTime
     */
    public function getStartReservationAt()
    {
        return $this->startReservationAt;
    }

    /**
     * Set endReservationAt
     *
     * @param \DateTime $endReservationAt
     *
     * @return Car
     */
    public function setEndReservationAt($endReservationAt)
    {
        $this->endReservationAt = $endReservationAt;

        return $this;
    }

    /**
     * Get endReservationAt
     *
     * @return \DateTime
     */
    public function getEndReservationAt()
    {
        return $this->endReservationAt;
    }

    /**
     * Set endRentAt
     *
     * @param \DateTime $endRentAt
     *
     * @return Car
     */
    public function setEndRentAt($endRentAt)
    {
        $this->endRentAt = $endRentAt;

        return $this;
    }

    /**
     * Get endRentAt
     *
     * @return \DateTime
     */
    public function getEndRentAt()
    {
        return $this->endRentAt;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Car
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }



    /**
     * Add carOrder
     *
     * @param \Extremism\CarRentalBundle\Entity\CarOrder $carOrder
     *
     * @return Car
     */
    public function addCarOrder(\Extremism\CarRentalBundle\Entity\CarOrder $carOrder)
    {
        $this->carOrder[] = $carOrder;

        return $this;
    }

    /**
     * Remove carOrder
     *
     * @param \Extremism\CarRentalBundle\Entity\CarOrder $carOrder
     */
    public function removeCarOrder(\Extremism\CarRentalBundle\Entity\CarOrder $carOrder)
    {
        $this->carOrder->removeElement($carOrder);
    }

    /**
     * Get carOrder
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarOrder()
    {
        return $this->carOrder;
    }
}
