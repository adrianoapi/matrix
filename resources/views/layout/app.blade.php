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
                  <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                  </li>
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
