<!doctype html>
<html>
    <head>
        <title>Matrix - @yield('title')</title>
        {{Html::style('css/bootstrap.min.css')}}
        {{Html::style('css/bootstrap-theme.min.css')}}
    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
            <div class="container">
              <a href="/produtos" class="navbar-brand">Matrix</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="../help/">Help</a>
                  </li>
                </ul>
                  
                  <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                      <li><a href="{{ url('/adicionar-produto/') }}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo produto</a></li>
                    @endif
                    <!-- Authentication Links -->
                    @if(Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                  
              </div>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        {{Html::script('js/jquery-3.3.1.min.js')}}
        {{Html::script('js/bootstrap.min.js')}}
    </body>
</html>
