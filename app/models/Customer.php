<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array('stripe_user_id');

}
