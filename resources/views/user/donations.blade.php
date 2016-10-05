@extends('layouts.app')

@section('head')

  <style>
   .saldo {
       border-bottom: double @if( $user->saldo() > 0 ) green @else red @endif 3px;
       color: @if( $user->saldo() > 0 ) green @else red @endif;
   }
  </style>
@stop

@section('content')

  <div class="container">
    <div class="col-md-12">
      <h1>..::[~my~donations~]::..</h1>
      <hr/>
    </div>
    <div class="col-md-6">
      <ul>
        @foreach( $user->donations as $donation)
          <li>{{ $donation->created_at }} – <b>{{ $donation->euro }},{{ $donation->cent }} €</b></li>
        @endforeach
      </ul>
      <div class="col-sm-5">
        <hr/>
        <h1 class="saldo"><small>saldo: </small> {{ $user->saldo() }} <span class="glyphicons glyphicon-eur"></span> </h1>
      </div>
    </div>
    <div class="col-md-6">
      {!! Form::open() !!}
      {!! Form::token() !!}

      <div class="col-md-6">
        {{ Form::label('euro', 'Donate:') }}
        <div class="input-group">
          {{ Form::text('euro', null, [ 'placeholder' => '0', 'class' => 'form-control' ]) }}
          <span class="input-group-addon">.</span>
          {{ Form::text('cent', null, [ 'placeholder' => '0', 'class' => 'form-control' ]) }}
          <span class="input-group-addon">€</span>
        </div>
      </div>
      <div class="col-md-12">
        <hr/>
        {!! Form::submit('Donate!', [ 'class' => 'btn btn-success col-sm-12']) !!}

        {!! Form::close() !!}
      </div>

    </div>

  </div>

@stop

@section('foot')

@stop
