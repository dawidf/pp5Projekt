<?php

namespace Extremism\CarRentalBundle\Controller;

use Extremism\CarRentalBundle\Entity\CarOrder;
use Extremism\CarRentalBundle\Form\PaymentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PaymentController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/conform-transaction")
     * @Template()
     */
    public function conformTransactionAction(Request $request)
    {
        $pin = 'I3X3ADDgJqSCOuyVC6M16gfLjfvVdmV3';

        $paramsForSign = $request->request->all();
        unset($paramsForSign['signature']);

        $paramsForSign = implode('', $paramsForSign);
        $sign = $pin.$paramsForSign;

//        $sign =
//            $pin.
//            $request->request->get('id').
//            $request->request->get('operation_number').
//            $request->request->get('operation_type').
//            $request->request->get('operation_status').
//            $request->request->get('operation_amount').
//            $request->request->get('operation_currency').
//            $request->request->get('operation_original_amount').
//            $request->request->get('operation_original_currency').
//            $request->request->get('operation_datetime').
//            $request->request->get('control').
//            $request->request->get('description').
//            $request->request->get('email').
//            $request->request->get('p_info').
//            $request->request->get('p_email').
//            $request->request->get('channel');
//        ;



        $signature = hash('sha256', $sign);

        $this->get('logger')->addInfo('params', [
            'params' => $request->request->all(),
            'sigFromPayPal' => $request->request->get('signature'),
            'mySignature' => $signature,
        ]);

        if($signature == $request->request->get('signature'))
        {
            $em = $this->getDoctrine()->getManager();
            $carOrderRepo = $em->getRepository('ExtremismCarRentalBundle:CarOrder');

            /**
             * @var $carOrder CarOrder
             */
            $carOrder = $carOrderRepo->getOrderAndCar((int) $request->request->get('control'));

//            $this->get('logger')->addAlert('carOrder', [
//                'instance' => print_r($carOrder, true)
//            ]);


            $startReservation = new \DateTime();
            $endReservation = $startReservation->modify('+ '. $carOrder->getForDays() .'days');
            $carOrder->getCars()->setEndReservationAt($endReservation);
            $carOrder->setOperationNumber($request->request->get('operation_number'));
            $carOrder->setOperationStatus($request->request->get('operation_status'));
            $carOrder->setOperationCurrency($request->request->get('operation_amount'));
            $carOrder->setDescription('description');

            $em->persist($carOrder);

            $em->flush();

        }

        dump($signature, $request->request->get('signature'));die;



        return $this->render('', array('name' => 'ok'));
    }

    /**
     * @param $id
     * @return Response
     * @Route("/test/{id}")
     */
    public function test($id)
    {
        return new Response($id);
    }
    /**
     * @param Request $request
     * @param $carId
     * @return array
     * @Route("/wypozycz-auto/{carId}", name="rent_car")
     * @Template()
     */
    public function rentCarAction($carId, Request $request)
    {
        $carOrder = new CarOrder();
        $form = $this->rentCreateForm($carOrder, $carId);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $carPayment = $this->get('extremism.service.payment_service')->addPayment($carOrder, $carId);
            if($carPayment)
            {
                $this->addFlash('success', 'Rezerwacja przebiegła pomyślnie');
                $asd = 'api_version=dev&description=asd&email=dsa@wp.pl&firstname=ja&surname=nieja';
                $shopId = '721803';
                $apiVersion = 'dev';
                $currency = 'PLN';
                $amount = $carOrder->getCars()->getPrice();
                $control = $carOrder->getId();
                $description = 'Rent a Car';
                $email = $carOrder->getEmail();
                $firstName = $carOrder->getName();
                $surname  = $carOrder->getSurname();


                $paymentLink = 'https://ssl.dotpay.pl/test_payment/';
                $paymentParams = '?id='.$shopId.'&amount='.$amount.'&currency='.$currency.'&control='.$control.
                    '&api_version='.$apiVersion.'&description='.$description.'&email='.$email.
                    '&firstname='.$firstName.'&surname='.$surname;
                $redirectToPay = $paymentLink.$paymentParams;

                return $this->redirect($redirectToPay);
            }
            else
            {
                $this->addFlash('error', 'Rezerwacja nie została zrealizowana');
            }
        }


        return [
            'form' => $form->createView(),
        ];
    }
    public function rentCreateForm(CarOrder $carOrder, $carId)
    {
        $form = $this->createForm(PaymentType::class, $carOrder, [
            'action' => $this->generateUrl('rent_car', ['carId' => $carId]),
            'method' => 'POST',
        ]);

        $form->add('submit', SubmitType::class, ['label' => 'Zamów auto']);

        return $form;
    }
}
