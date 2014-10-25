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
        
        <form action="/charge" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{$stripekey}}"
                data-image="/square-image.png"
                data-name="Demo Site"
                data-description="2 widgets ($20.00)"
                data-amount="2000">
            </script>
        </form>
    </div>
</div>
@stop