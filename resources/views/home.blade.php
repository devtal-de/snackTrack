@extends('layouts.app')

@section('head')

  <style>
   .snack { max-height: 350px; }
   img { max-width: 100%; height: auto; max-height: 150px; }
   .snack > a {
       text-decoration: none !important;
       display: inline-block;
   }
   .snack > a:hover {
       text-decoration: none !important;
   }
  </style>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading text-center">..::Welcome {{ Auth::user()->name }}::..</div>

        <div class="panel-body text-center">
          <p>Select some Snacks:
            <ul class="list-group">
              @foreach( $snacks as $snack )
                <li class="list-group-item col-xs-4 snack">
                  <a href="/snack/{{ $snack->id }}/buy">
                    <h3>{{ $snack->name }}</h3>
                    <hr/>
                    <img src="{{ $snack->image }}" ></img>
                    <p><small>{{ $snack->weight }}g</small></p>
                    <h3 class="text-right">{{ $snack->price }}€</h3>
                  </a>
                </li>
              @endforeach
            </ul>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
