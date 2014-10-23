<?php

use Laravel\Cashier\BillableTrait;
use Laravel\Cashier\BillableInterface;

class User extends Eloquent implements BillableInterface {

    use BillableTrait;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

}
