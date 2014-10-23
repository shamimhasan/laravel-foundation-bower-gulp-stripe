@extends('layouts.full-width')

@section('content')

<div class="row">
    <div class="small-12 column">
        <h2>Stripe Payment</h2>

        @if (Session::has('message'))
        <div data-alert class="alert-box success">
            {{ Session::get('message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

    </div>
</div>
@stop