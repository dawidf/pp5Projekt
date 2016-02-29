<?php

namespace Extremism\CarRentalBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * CarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarRepository extends EntityRepository
{
    public function getFreeCars()
    {
        $qb = $this->createQueryBuilder('cars')
            ->select('cars')
        ;
        $qb
            ->where(
            $qb->expr()->andX(
                $qb->expr()->gt(':currentDate', 'cars.endReservationAt'),
                $qb->expr()->gt(':currentDate', 'cars.endRentAt')


            ))
            ->setParameter('currentDate', new \DateTime())
            ->orWhere('cars.endRentAt IS NULL')
            ->orWhere('cars.endReservationAt IS NULL')
//            ->andWhere($qb->expr()->orX(
//                $qb->expr()->isNull('cars.endReservationAt'),
//                $qb->expr()->isNull('cars.endRentAt')
//            ))
        ;

        return $qb->getQuery()->getArrayResult();
    }
}
