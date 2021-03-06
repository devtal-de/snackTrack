<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        <li><a href="/snacks"><span class="glyphicon glyphicon-cutlery"></span> Snacks</a></li>
        @if( Auth::check() )
          @if( Auth::user()->hasRole('admin') )
          <li><a href="{{ route('admin.snacks') }}"><span class="glyphicon glyphicon-dashboard"></span> Admindashboard</a></li>
          @endif
        @endif
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              [<span class="mini_saldo">{{ Auth::user()->saldo() }} €</span>] {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="/profile"><span class="glyphicon glyphicon-profile"></span>Profile</a>
              </li>
              <li>
                <a href="{{ route('my.purchases') }}"><span class="glyphicon glyphicon-shopping-cart"></span> My Purchases</a>
              </li>
              <li>
                <a href="{{ route('my.donations') }}"><span class="glyphicon glyphicon-eur"></span> My Donations</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <span class="glyphicon glyphicon-log-out"></span> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
