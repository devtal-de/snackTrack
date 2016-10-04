@extends('layouts.app')

@section('head')

@stop

@section('content')

  <div class="container">
    <h1>..::[Snacks]::..</h1>
    <hr/>
    <div class="row">
      <div class="col-md-6">
        <p><a class="btn btn-default" href="{{ route('admin.create.snack') }}">new Snack</a></p>
        <hr/>
        <ul class="list-group">
          @foreach($snacks as $snack)
            <li class="row list-group-item">
              <div class="col-sm-6">
                <h3>{{ $snack->name }}</h3><hr/>
                <div class="col-sm-6">Gewicht:</div>
                <div class="col-sm-6"><b>{{ $snack->weight }}g</b></div>
                <hr/>
                <div class="col-sm-6">Preis:</div>
                <div class="col-sm-6"><b>{{ $snack->euro }},{{ $snack->cent }} €</b></div>
              </div>
              <div class="col-sm-6 text-right">
                <img src="{{ url($snack->image) }}" width="100%"></img>
                <a href="{{ route('admin.edit.snack', $snack->id) }}">[edit]</a>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@stop

@section('foot')

@stop
