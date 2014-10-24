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

    </div>
    <div class="small-6 column end">
        <script src="https://checkout.stripe.com/checkout.js"></script>
        <button id="customButton"><i class="fa fa-cc-stripe"></i> Connect with Stripe</button>
        <script>
            var handler = StripeCheckout.configure({
                key: '{{$stripekey}}',
                image: '/square-image.png',
                token: function (token) {
                    // Use the token to create the charge with a server-side script.
                    // You can access the token ID with `token.id`
                }
            });

            document.getElementById('customButton').addEventListener('click', function (e) {
                // Open Checkout with further options
                handler.open({
                    name: '1-click Pony',
                    description: 'Silver Plan',
                    amount: 0000
                });
                e.preventDefault();
            });
        </script>
    </div>
</div>
@stop