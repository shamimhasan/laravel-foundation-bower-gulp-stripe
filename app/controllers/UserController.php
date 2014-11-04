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
        $stripe = OAuth::consumer('Stripe');
        if (Input::has('code')) {
            $accessCode = Input::get('code');

            $token = $stripe->requestAccessToken($accessCode);
            $customer_data = $token->getExtraParams();


            $customer = Customer::firstOrCreate(array('stripe_user_id' => $customer_data['stripe_user_id']));
            $customer->stripe_user_id = $customer_data['stripe_user_id'];
            $customer->access_token = $token->getAccessToken();
            $customer->refresh_token = $customer_data['refresh_token'];
            $customer->livemode = $customer_data['livemode'];
            $customer->stripe_publishable_key = $customer_data['stripe_publishable_key'];
            $customer->token_type = $customer_data['token_type'];
            $customer->save();
//            Session::flash('success', 'Access Granted');
            return Redirect::to('success');
        } else if (Input::has('error')) {
            return View::make('user.connect')
                            ->withClientid(getenv('stripe.client.id'))->withError(Input::get('error_description'));
        } else {
            return View::make('user.connect')
                            ->withClientid(getenv('stripe.client.id'));
        }
    }

    public function getConnectuser() {
        Stripe::setApiKey(getenv('stripe.secret.key'));
        $customer = Stripe_Customer::all();
        echo '<pre>';
        print_r($customer);
        die();
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
                "amount" => 2000, # amount in cents, again
                "currency" => "usd",
                "customer" => $Stripecustomer->id)
            );

            // SAVE CUSTOMER TO DATABASE


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

    public function getSuccess() {
        return View::make('user.success');
    }

    public function getStripecustomer() {
        $customers = Customer::all();
        return View::make('user.customers')
                        ->withCustomers($customers);
    }

    public function getAlluser($id) {

        $customer = Customer::find($id);
        $user_access_token = $customer->access_token;
        Stripe::setApiKey($user_access_token);
        $users = Stripe_Customer::all();
        foreach ($users->data as $user) {
            $suser = User::firstOrCreate(array('user_id' => $user->id));
            $suser->customer_id = $id;
            $suser->description = $user->description;
            $suser->email = $user->email;
            $cards = array();
            foreach ($user->cards->data as $card) {
                $cards[] = array(
                    'id' => $card->id,
                    'last4' => $card->last4,
                    'brand' => $card->brand,
                    'exp_month' => $card->exp_month,
                    'exp_year' => $card->exp_year
                );
            }
            $suser->cards = json_encode($cards);
            $suser->default_card = $user->default_card;
            $suser->save();
        }
        return Redirect::to('listuser/' . $id);
    }

    public function getListuser($id) {
        $users = User::where('customer_id', '=', $id)->get();
        return View::make('user.listuser')
                        ->withUsers($users)
                        ->withCustomer($id);
    }

    public function getStripeusercustomer() {
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
