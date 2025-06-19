<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class Stripe extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'),);
    }

    public function getPaymentIntent($name, $description, $price, $metadata = [], $customerId = false)
    {
        try {
            $req = [
                'payment_method_types'  => ['card'],
                'amount'                => intval(round($price * 100)),
                'currency'              => 'usd',
                'description'           => $description,
                'shipping' => [
                    'name' => $name,
                    'address' => [
                        'line1' => '145 Eureka Way',
                        'postal_code' => '95376',
                        'city' => 'Tracy',
                        'state' => 'CA',
                        'country' => 'US',
                    ]
                ]
            ];
            if (!empty($customerId)) {
                $req['customer'] = $customerId;
                $req['setup_future_usage'] = 'off_session';
            }
            !empty($metadata) ? $req['metadata'] = $metadata : "";
            $intent = $this->stripe->paymentIntents->create($req);
            return ['success' => 1, 'intent' => $intent->id, 'secret' => $intent->client_secret];
        } catch (ApiErrorException $err) {
            return ['success' => 0, 'msg' => $err->getMessage()];
        } catch (Exception $err) {
            return ['success' => 0, 'msg' => $err->getMessage()];
        }
    }

    public function getPaymentDetails($intentId)
    {
        return $this->stripe->paymentIntents->retrieve($intentId);
    }

    public function initiateRefund($intentId, $amount = false)
    {
        $data = array(
            'payment_intent'    => $intentId
        );
        $amount ? $data['amount'] = $amount : '';
        return $this->stripe->refunds->create($data);
    }

    public function makePaymentUsingPaymentId($customerId, $paymentMethodId, $amount, $name, $description, $metadata = [])
    {
        $req = [
            "payment_method_types" => ['card'],
            'amount' => intval(round($amount * 100)),
            'customer' => $customerId,
            'payment_method' => $paymentMethodId,
            'currency'              => 'usd',
            'description'           => $description,
            'shipping' => [
                'name' => $name,
                'address' => [
                    'line1' => '510 Townsend St',
                    'postal_code' => '98140',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'country' => 'US',
                ],
            ],
            'off_session' => true,
            'confirm' => true,
        ];

        !empty($metadata) ? $req['metadata'] = $metadata : '';
        $transaction = $this->stripe->paymentIntents->create($req);
        return $transaction;
    }

    public function createCustomer($name, $email)
    {
        return $this->stripe->customers->create([
            'name'  => $name,
            'email' => $email
        ]);
    }

    public function attachCustomerPaymentMethod($paymentMethodId, $customerId)
    {
        return $this->stripe->paymentMethods->attach($paymentMethodId, [
            'customer' => $customerId
        ]);
    }
}
