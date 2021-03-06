<?php

namespace Extremism\CarRentalBundle\Controller;

use Extremism\CarRentalBundle\Entity\Car;
use Extremism\CarRentalBundle\Form\CarType;
use Extremism\CarRentalBundle\Form\PaymentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;

class CarController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {

        $carRepo = $this->getDoctrine()->getRepository('ExtremismCarRentalBundle:Car');
        $cars = $carRepo->getFreeCars();

//        $car = new Car();
//        $car->setName('auto 5')->setPrice(999.11)->setSegment('duzy')
//            ->setEndRentAt(new \DateTime())
//            ->setEndReservationAt(new \DateTime());
//
//
//
//        if($this->get('extremism.service.car_service')->addCar($car))
//        {
//            $this->addFlash('success', 'Dodano poprawnie samochód');
//        }
//        else
//        {
//            $this->addFlash('error', 'Nie dodano samochodu niga');
//        }
//
//        return new Response('ok');

        dump($cars);
        return [
            'cars' => $cars,

        ];
    }

    /**
     * @Route("/add-car")
     * @Template()
     */
    public function addCarAction()
    {
        $form = new CarType();


        dump($form);
        return [
            'form' => $form
        ];
    }

    /**
     * @Route("/send-paymend")
     */
    public function sendPayment()
    {

    }

    /**
     * @Route("/rezerwacja/{carid}")
     * @Template()
     */
    public function makeReservation(Request $request, $carId)
    {
        $form = new PaymentType($request);





        return ;
    }





}
