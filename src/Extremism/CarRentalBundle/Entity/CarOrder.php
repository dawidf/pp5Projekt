<?php

namespace Extremism\CarRentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Extremism\CarRentalBundle\Entity\Car;

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
     * @ORM\ManyToOne(targetEntity="Extremism\CarRentalBundle\Entity\Car", inversedBy="carOrder")
     * @ORM\JoinColumn(name="id_car", referencedColumnName="id")
     */
    private $cars;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
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
     * @ORM\Column(name="postal_code", type="string", length=40)
     */
    private $postalCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="for_days", nullable=true)
     */
    private $forDays;

    /**
     * @ORM\Column(name="operation_number", type="string", nullable=true)
     */
    private $operationNumber;
    /**
     * @ORM\Column(name="operation_status", type="string", nullable=true)
     */
    private $operationStatus;
    /**
     * @ORM\Column(name="operation_currency", type="decimal", nullable=true)
     */
    private $operationCurrency;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
     * Set operationNumber
     *
     * @param string $operationNumber
     *
     * @return CarOrder
     */
    public function setOperationNumber($operationNumber)
    {
        $this->operationNumber = $operationNumber;

        return $this;
    }

    /**
     * Get operationNumber
     *
     * @return string
     */
    public function getOperationNumber()
    {
        return $this->operationNumber;
    }

    /**
     * Set operationStatus
     *
     * @param string $operationStatus
     *
     * @return CarOrder
     */
    public function setOperationStatus($operationStatus)
    {
        $this->operationStatus = $operationStatus;

        return $this;
    }

    /**
     * Get operationStatus
     *
     * @return string
     */
    public function getOperationStatus()
    {
        return $this->operationStatus;
    }

    /**
     * Set operationCurrency
     *
     * @param string $operationCurrency
     *
     * @return CarOrder
     */
    public function setOperationCurrency($operationCurrency)
    {
        $this->operationCurrency = $operationCurrency;

        return $this;
    }

    /**
     * Get operationCurrency
     *
     * @return string
     */
    public function getOperationCurrency()
    {
        return $this->operationCurrency;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return CarOrder
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
     * Set cars
     *
     * @param Car $cars
     *
     * @return CarOrder
     */
    public function setCars(Car $cars = null)
    {
        $this->cars = $cars;

        return $this;
    }

    /**
     * Get cars
     *
     * @return Car
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * Set forDays
     *
     * @param string $forDays
     *
     * @return CarOrder
     */
    public function setForDays($forDays)
    {
        $this->forDays = $forDays;

        return $this;
    }

    /**
     * Get forDays
     *
     * @return string
     */
    public function getForDays()
    {
        return $this->forDays;
    }
}
