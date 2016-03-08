<!doctype html>
<html>
<head>
    <title>Inovatori</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css" >
    <link href='https://fonts.googleapis.com/css?family=Andika&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="{{ asset('plugins/lightbox/lightbox.css') }}" rel="stylesheet" type="text/css" >
    <link rel="icon" href="{{ asset('images/favicon.png') }}" sizes="16x16 32x32" type="image/png">
    @yield('css')
    @yield('googlemaps')
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">
                <img src='{{ asset('images/logo.png') }}' alt="">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class='{{ (Request::is('/') ? 'active' : '') }}{{ (Request::is('novosti/*') ? 'active' : '') }}'><a href="{{ url('/') }}">Novosti</a></li>
            <li class='{{ (Request::is('onama*') ? 'active' : '') }}'><a href="{{ url('onama') }}">O nama</a></li>
            <li class='{{ (Request::is('projekti*') ? 'active' : '') }}'><a href="{{ url('projekti') }}">Projekti</a></li>
            <li class='{{ (Request::is('galerija*') ? 'active' : '') }}'><a href="{{ url('galerija') }}">Galerija</a></li>
            <li class='{{ (Request::is('pristupnica*') ? 'active' : '') }}'><a href="{{ url('pristupnica') }}">Pristupnica</a></li>
            <li class='{{ (Request::is('kontakt*') ? 'active' : '') }}'><a href="{{ url('kontakt') }}">Kontakt</a></li>
            @if (auth()->check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('profil') }}"><i class="fa fa-user"></i> Moj Profil</a></li>
                            <li><a href="{{ url('profil/clanarina') }}"><i class="fa fa-money"></i> Članarina</a></li>
                            <li><a href="{{ url('profil/projekti') }}"><i class="fa fa-tasks"></i> Moji projekti</a></li>
                            @if (auth()->check() && auth()->user()->admin == "Da")
                                <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Administracija</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('profil/logout') }}"><i class="fa fa-sign-out"></i> Odjava</a></li>
                        </ul>
                    </a>
                </li>
            @else 
                <li>
                    <a href="{{ url('profil/login') }}">
                        <i class="fa fa-lock"></i>
                    </a>
                </li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <div class="big-title" style='@yield('title-slika')'>
          <div class='text-center' style='@yield('title-text')'>
                <span>@yield('title')</span>
          </div>
    </div>
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success alert-dismissible {{ Session::has('flash_message_important') ? 'alert-important' : '' }}" role="alert">
                @if(Session::has('flash_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @endif
                {{ session('flash_message') }}
            </div>
        @endif
        
        @yield('content')
    </div>
    <footer class="footer1">
      <div class="container">
        <p class="text-muted text-center" style='padding-top:20px'>2015 Centar inovatorstva | Made by: Antun Jalovičar.</p>
      </div>
    </footer>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins/lightbox/lightbox.js') }}"></script>
<script src="{{ asset('plugins/cookie/jquery.cookiebar.js') }}"></script>
<script>
 $(document).ready(function() {
   $.cookieBar({
    fixed: true,
    bottom: true,
    acceptText: 'Slažem se',
    policyButton: true,
    policyText: 'Saznaj više o kolačićima',
    policyURL: '{{ url('kolacici') }}',
    message: 'Ova stranica koristi tzv. kolačiće kako bi osigurala bolje korisničko iskustvo i funkcionalnost.<br> Koristeći našu stranicu slažete se s korištenjem kolačića.',
    zindex: '9999',
});
});
</script>
@yield('javascript')

    @if (auth()->check() && auth()->user()->admin == "Da")

    <script>
    $(document).ready(function() {

       
            // Add loading state
            $('.broj_prijava').html('<i class="fa fa-spinner fa-spin"></i>');
            // Set request
            var request = $.get('{{ url('dashboard/podaci/broj') }}');
            // When it's done
            request.done(function(response) {
                $('.broj_prijava').html(response);
            });
        
        
        
        });
    </script>
@endif
</body>
</html>