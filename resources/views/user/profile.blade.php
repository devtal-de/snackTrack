@extends('layouts.app')

@section('head')

@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>
          {{ $user->name }}'s profile
        </h1>
        <hr/>
      </div>
      <div class="col-md-6">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('profile') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" required autofocus>

              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

              @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Register
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

@stop

@section('foot')

@stop
