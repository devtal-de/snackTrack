@extends('layouts.app')

@section('head')

@stop

@section('content')

  <div class="container">
    <h1>Welcome to {{ config('app.name', 'SnackTrack') }}</h1>
    <hr/>
    @if( Auth::check())
      <p>Hi {{ Auth::user()->name }}. Wanna <a href="{{ route('snacks') }}">get some goodies</a>?</p>
    @else
      <p>Please register to buy snacks or donate money.</p>
    @endif
  </div>

@stop

@section('foot')

@stop
