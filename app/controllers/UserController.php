<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends BaseController {

    public function getIndex() {

        return View::make('user.index')
                        ->withClientid(getenv('stripe.client.id'));
    }

    public function getConnect() {
        if (Input::has('code')) {
            $accessCode = Input::get('code');

            $token_request_body = array(
                'grant_type' => 'authorization_code',
                'client_id' => getenv('stripe.client.id'),
                'code' => $accessCode,
                'client_secret' => getenv('stripe.secret.key')
            );

            $req = curl_init('https://connect.stripe.com/oauth/token');
            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($req, CURLOPT_POST, true);
            curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));

            $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
            $data = curl_exec($req);

            $resp = json_decode(curl_exec($req), true);
            curl_close($req);

            print_r($data);

            echo $resp['access_token'];
            die();
            $customer = Stripe_Customer::create(array(
                        "card" => $resp['access_token'],
                        "description" => "payinguser@example.com")
            );
        } else {
            return View::make('user.connect')
                            ->withClientid(getenv('stripe.client.id'));
        }
    }

    /* CHARGE USER */

    public function getCharge() {

        return View::make('user.charge')
                        ->withStripekey(getenv('stripe.public.key'));
    }

    public function postCharge() {
        Stripe::setApiKey(getenv('stripe.secret.key'));

        $stripeToken = Input::get('stripeToken');
        $stripeEmail = Input::get('stripeEmail');

        try {
            //SAVE CUSTOMER TO STRIPE
            $Stripecustomer = Stripe_Customer::create(array(
                        "card" => $stripeToken,
                        "description" => $stripeEmail,
                        "email" => $stripeEmail)
            );

            //CHARGE CUSTOMER
            Stripe_Charge::create(array(
                "amount" => 1000, # amount in cents, again
                "currency" => "usd",
                "customer" => $Stripecustomer->id)
            );

            // SAVE CUSTOMER TO DATABASE
            $customer = new Customer;
            $customer->email = $stripeEmail;
            $customer->customer_id = $Stripecustomer->id;
            $customer->save();

            Session::flash('message', "Payment Successful");
            return Redirect::to('success-pay');
        } catch (Stripe_CardError $e) {
            die('error');
            return Redirect::back()
                            ->withErrors(['msg', $e]);
        }
    }

    public function getConnectCharge() {

        return View::make('user.connectcharge')
                        ->withStripekey(getenv('stripe.public.key'));
    }

    public function postConnectCharge() {
        Stripe::setApiKey(getenv('stripe.secret.key'));

        $stripeToken = Input::get('stripeToken');
        $stripeEmail = Input::get('stripeEmail');
        $user_connect_token = "";

        $charge = Stripe_Charge::create(array(
                    "amount" => 1000,
                    "currency" => "usd",
                    "card" => $stripeToken,
                    "description" => $stripeEmail,
                    "application_fee" => 123
                        ), $user_connect_token
        );
    }

    public function getConnectSubscription() {

        return View::make('user.connectsubscription')
                        ->withStripekey(getenv('stripe.public.key'));
    }

    public function postConnectSubscription() {
        Stripe::setApiKey(getenv('stripe.secret.key'));

        $stripeToken = Input::get('stripeToken');
        $stripeEmail = Input::get('stripeEmail');
        $user_connect_token = "";

        $Stripecustomer = Stripe_Customer::create(array(
                    "card" => $stripeToken,
                    "description" => $stripeEmail,
                    "email" => $stripeEmail)
        );
        $Stripecustomer->update_subscription(array(
            "application_fee_percent" => 20
                ), $user_connect_token
        );
    }

    public function getPaymentsuccess() {
        return View::make('user.success');
    }

    public function getStripecustomer() {
//        Customer::findOrFail(1);
//        die();

        Stripe::setApiKey(getenv('stripe.secret.key'));
        $customers = Stripe_Customer::all();
        return View::make('user.customers')
                        ->withCustomers($customers);
    }

    public function getApplicationfees() {
//        Customer::findOrFail(1);
//        die();

        Stripe::setApiKey(getenv('stripe.secret.key'));
        $fees = Stripe_ApplicationFee::all();
        return View::make('user.applicationfees')
                        ->withFees($fees);
    }

}
