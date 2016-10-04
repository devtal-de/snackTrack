@extends('layouts.app')

@section('head')

@stop

@section('content')

  <div class="container">
    <div class="col-md-12">
      <h1>..::[My Purchases]::..</h1>
      <hr/>
    </div>
    <div class="col-md-6">
      <ul class="list-group">
        @foreach( $user->purchases as $snack)
          <li class="list-group-item row">
            <div class="col-sm-12">
              <h4>{{ $snack->snack->name }}</h4>
              <hr/>
            </div>
            <div class="col-sm-3">
              <b>Date :</b>
            </div>
            <div class="col-sm-8">
              {{ date_format(date_create($snack->created_at), 'd.m.y h:i') }} Uhr
            </div>
            <div class="col-sm-3">
              <b>Weight :</b>
            </div>
            <div class="col-sm-8">
              {{ $snack->snack->weight }} g
            </div>
            <div class="col-sm-3">
              <b>Price :</b>
            </div>
            <div class="col-sm-8">
            {{ $snack->snack->euro }},{{ $snack->snack->cent }} €
            </div>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="col-md-6">
      <p>You purchased <h3>{{ $user->purchases->count() }}</h3> snacks for <h3>{{ $user->spentMoneySoFar() }} €</h3> so far.
    </div>
  </div>

@stop

@section('foot')

@stop
