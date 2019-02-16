<!DOCTYPE html>
<html>
    <head>
        @include('layout.meta-tags')
        <title>{{ setting('site.title') }} | @yield('title', 'Início')</title>

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="{{asset('css/fontastic.css')}}">
        <!-- Google fonts - Open Sans-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <!-- Fancybox-->
        <link rel="stylesheet" href="{{asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.css')}}">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        @stack('css')
        @toastr_css
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      @include('layout.navbar')
    </header>
    <div class="container">
      <div class="row">
        @yield('content')
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Procurar no blog</h3>
            </header>
            <form action="{{ route('search') }}" class="search-form">
              <div class="form-group">
                <input type="search" name="search" placeholder="O que você está procurando?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget] -->
          @include('layout.latest')
          <!-- Widget [Categories Widget] -->
          @include('layout.category')
        </aside>
      </div>
    </div>
    <!-- Page Footer-->
    <footer class="main-footer">
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy; {{ date('Y') }}. Todos os direitos reservados <a href="{{ url('/') }}" target="_blank">{{ setting('site.title') }}</a>.</p>
            </div>
            <div class="col-md-6 text-right">
              <p>Desenvolvido com <i class="fa fa-heart"></i> por <a href="http://brtechsistemas.com.br" class="text-white">BR tech Sistemas</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="{{('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{('/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{('/vendor/@fancyapps/fancybox/jquery.fancybox.min.js')}}"></script>
    <script src="{{('/js/front.js')}}"></script>
    @toastr_js
    @toastr_render
  </body>
</html>
