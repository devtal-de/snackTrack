<!doctype html>
<html lang="de">
  <head>
    <meta charset="UTF-8"/>
    <title>{{ config('app.name', 'Snack-Vendor') }}</title>

    @yield('head')

  </head>
  <body>

    @yield('content')

    @yield('foot')

  </body>
</html>
