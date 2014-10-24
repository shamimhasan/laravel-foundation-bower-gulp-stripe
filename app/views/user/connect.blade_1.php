@extends('layouts.full-width')

@section('content')

<div class="row">
    <div class="small-12 column">
        <h2>1-Click Pony</h2>

    </div>
    <div class="small-6 column end">
        <?php
        $authorize_request_body = array(
            'response_type' => 'code',
            'scope' => 'read_write',
            'client_id' => $clientid
        );
        $url = 'https://connect.stripe.com/oauth/authorize' . '?' . http_build_query($authorize_request_body);
        ?>
        <a href="<?= $url ?>" class="stripe-connect"><span>Connect with Stripe</span></a>
    </div>
</div>
@stop