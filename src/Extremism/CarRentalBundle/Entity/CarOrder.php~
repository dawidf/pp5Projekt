<?php

namespace Extremism\CarRentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarOrder
 *
 * @ORM\Table(name="car_order")
 * @ORM\Entity(repositoryClass="Extremism\CarRentalBundle\Repository\CarOrderRepository")
 */
class CarOrder
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
     * @var \DateTime
     *
     * @ORM\Column(name="CreatedAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=40)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=40)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", length=40)
     */
    private $postalCode;

    /**
     * @ORM\ManyToOne(targetEntity="Extremism\CarRentalBundle\Entity\Car", inversedBy="carOrder")
     * @ORM\JoinColumn(name="id_car", referencedColumnName="id")
     */
    private $cars;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CarOrder
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CarOrder
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
     * Set surname
     *
     * @param string $surname
     *
     * @return CarOrder
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return CarOrder
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return CarOrder
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CarOrder
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return CarOrder
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set car
     *
     * @param \stdClass $car
     *
     * @return CarOrder
     */
    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \stdClass
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set cars
     *
     * @param \Extremism\CarRentalBundle\Entity\Car $cars
     *
     * @return CarOrder
     */
    public function setCars(\Extremism\CarRentalBundle\Entity\Car $cars = null)
    {
        $this->cars = $cars;

        return $this;
    }

    /**
     * Get cars
     *
     * @return \Extremism\CarRentalBundle\Entity\Car
     */
    public function getCars()
    {
        return $this->cars;
    }
}
