<?php

namespace Extremism\CarRentalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
//            'params' => $request->request->all(),
            'sigFromPayPal' => $request->request->get('signature'),
            'mySignature' => $signature,
        ]);

        if($signature == $request->request->get('signature'))
        {
            return new Response('OKA');
        }

        dump($signature, $request->request->get('signature'));die;



        return $this->render('', array('name' => 'dupa'));
    }
}
