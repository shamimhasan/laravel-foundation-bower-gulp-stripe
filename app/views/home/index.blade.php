@extends('layouts.master')

@section('content')

  <pre>Current View: app/views/home/index.blade.php</pre>

  <pre>Current App Environment: {{ App::environment() ?: 'production' }}</pre>

@stop
