<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tijuana @yield('titulo')</title>
    @routes
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carga.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/icons/implementtaIcon.png') }}">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css"
        id="theme-styles">
    @yield('css')
</head>

<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
    {{-- Spinner de caraga --}}
    <div id="contenedor_carga">
        <div id="carga">
        </div>
    </div>
    {{-- Navegador --}}
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="{{ asset('../../../../Administrador/selectSistem.php') }}"><img
                src="{{ asset('img/icons/logoImplementtaHorizontal.png') }}" width="250" height="82"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto gap-2">
                <a class="nav-item nav-link" href="{{ asset('../../../../Administrador/selectSistem.php') }}"> Inicio
                </a>
                <a class="nav-item nav-link" href="{{ asset('../../../../Administrador/config.php') }}"> <i
                        class="fas fa-users-cog"></i> Administrador </a>
                <a class="nav-item nav-link" href="{{ asset('../../../../Administrador/logout.php') }}"> Salir <i
                        class="fas fa-sign-out-alt"></i></a>
            </ul>
        </div>
    </nav>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark line" style="opacity: .9">
        <div class="btn-group  ms-auto" style="margin-right: 100px">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Tijuana Predial
            </button>
            <ul class="dropdown-menu">
                <h6 class="dropdown-header">Utilidades de la plaza</h6>
                <a class="dropdown-item" href="{{ route('index') }}">
                    <i class="fas fa-balance-scale"></i>
                    Determinaciones Fiscales</a>
                <a class="dropdown-item" href="{{ route('pdf-mandamiento') }}">
                    <i class="fas fa-balance-scale"></i>
                    Prueba Mandamiento</a>
                <a class="dropdown-item" href="{{ route('pdf-requerimiento') }}">
                    <i class="fas fa-balance-scale"></i>
                    Prueba Requerimiento</a>
                <a class="dropdown-item" href="{{ route('formulario-requerimiento') }}">
                    <i class="fas fa-balance-scale"></i>
                    Form Requerimiento</a>
            </ul>
        </div>
    </div>
    <div>
        {{-- Cuerpo del contenido --}}
        @yield('contenido')
    </div>
    {{-- Footer --}}
    <footer class="navbar nav-pills nav-fill navbar-expand-lg gap-5 px-5">
        <span class="navbar-text" style="font-size:12px;font-weigth:normal;color: #7a7a7a;width: 40%;">
            Implementta ©<br>
            Estrategas de México <i class="far fa-registered"></i><br>
            Centro de Inteligencia Informática y Geografía Aplicada CIIGA
            <hr style="width:105%;border-color:#7a7a7a;">
            Created and designed by <i class="far fa-copyright"></i> <?php echo date('Y'); ?> Estrategas de México<br>
        </span>
        <span class="navbar-text mx-lg-5" style="font-size:12px;font-weigth:normal;color: #7a7a7a;">
            Contacto:<br>
            <i class="fas fa-phone-alt"></i> Red: 187<br>
            <i class="fas fa-phone-alt"></i> 66 4120 1451<br>
            <i class="fas fa-envelope"></i> sistemas@estrategas.mx<br>
        </span>
        <form class="form-inline my-2 my-lg-0 gap-2">
            <a href="../../index.php"><img src="{{ asset('img/bg/logoImplementta.png') }}" width="155"
                    height="150" alt=""></a>
            <a href="http://estrategas.mx/" target="_blank"><img src="{{ asset('img/icons/logoTop.png') }}"
                    width="200" height="85" alt=""></a>
        </form>
    </footer>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/offLoaderSpinner.js') }}"></script>
    <script src="{{ asset('js/bloqueos.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>
