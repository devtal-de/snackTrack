<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Snack-Vendor') }}</title>

    <link href="/css/app.css" rel="stylesheet">

    <script>
     window.Laravel = <?php echo json_encode([
         'csrfToken' => csrf_token(),
     ]); ?>
    </script>

    @if( Auth::check() )
      <style>
       .mini_saldo {
           color: @if( Auth::user()->saldo() > 0 ) green @else red @endif;
       }
      </style>
    @endif

    @yield('head')
  </head>
  <body>

    @include('common.nav')

    @yield('content')

    <script src="/js/app.js"></script>

    @yield('foot')

  </body>
</html>
