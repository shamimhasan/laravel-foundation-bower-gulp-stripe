@extends('layouts.full-width')

@section('content')

<div class="row">
    <div class="small-12 column">
        <h2>1-Click Pony</h2>
        @if($errors->any())
        <div data-alert class="alert-box error">
            {{$errors->first()}}
            <a href="#" class="close">&times;</a>
        </div>
        @endif
        @if(Session::has('success'))
        <div data-alert class="alert-box success">
            {{ Session::get('success') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif
    </div>
    @if(!Session::has('success'))
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
    @endif
</div>
@stop