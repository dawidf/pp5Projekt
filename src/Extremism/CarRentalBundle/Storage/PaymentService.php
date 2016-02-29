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
use Extremism\CarRentalBundle\Entity\CarOrder;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function storePayment(CarOrder $carOrder)
    {
        $this->entityManager->beginTransaction();

        try{

            $this->entityManager->persist($carOrder);

            $this->entityManager->flush();
            $this->entityManager->commit();

            return $carOrder;
        }
        catch (Exception $e)
        {
            $this->entityManager->rollback();
            $this->entityManager->close();


            return false;
        }
    }

    public function addPayment(CarOrder $carOrder, $carId)
    {
        $car = $this->entityManager->find('ExtremismCarRentalBundle:Car', $carId);

        if(!$car)
        {
            throw new NotFoundHttpException('Nie znalezino takiego samochodu');
        }
        $carOrder->setCars($car);
        $carOrder->getCars()->setEndReservationAt(new \DateTime('+ 3 minutes'));
        return $this->storePayment($carOrder, $carId);
    }
}