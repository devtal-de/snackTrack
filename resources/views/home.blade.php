@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading text-center">..::Welcome {{ Auth::user()->name }}::..</div>

        <div class="panel-body text-center">
          <p>Select some Snacks:
            <ul class="list-group">
              <li class="list-group-item col-xs-4">Snack1</<li>
              <li class="list-group-item col-xs-4">Snack2</<li>
              <li class="list-group-item col-xs-4">Snack3</<li>
              <li class="list-group-item col-xs-4">Snack4</<li>
              <li class="list-group-item col-xs-4">Snack5</<li>
              <li class="list-group-item col-xs-4">Snack6</<li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
