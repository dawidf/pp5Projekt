<?php
/**
 * Created by PhpStorm.
 * User: ssss
 * Date: 2/10/16
 * Time: 1:39 AM
 */

namespace Extremism\CarRentalBundle\Storage;

use Doctrine\ORM\EntityManager;
use Extremism\CarRentalBundle\Entity\Car;
use Symfony\Component\Config\Definition\Exception\Exception;

class CarService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function storeCar(Car $car)
    {
        $this->entityManager->beginTransaction();

        try{
            $this->entityManager->persist($car);

            $this->entityManager->flush();
            $this->entityManager->commit();

            return true;
        }
        catch (Exception $e)
        {
            $this->entityManager->rollback();
            $this->entityManager->close();

            dump($e->getMessage());
            return false;
        }
    }

    public function addCar(Car $car)
    {
        return $this->storeCar($car);
    }
}