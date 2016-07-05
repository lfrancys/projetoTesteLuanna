<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        @include('layout.css')
    </head>
    <body>

        <nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:250px;" id="mySidenav">
            <a href="#" class="w3-border-bottom w3-large"><img src="#" style="width:80%;">Girolando</a>


            <a href="#" class="w3-light-grey w3-medium">Home</a>
            <a href="{{route('produtos.index')}}">Produtos</a>
        </nav>
        <div class="w3-main" style="margin-left:250px;">

            <header class="w3-container w3-theme w3-padding-30" style="padding-left:32px">
                <h1 class="w3-xlarge w3-padding-5">Sistema Girolando</h1>
            </header>

            <div class="w3-container w3-padding-32" style="padding-left:32px">
                @yield('content')
            </div>
        </div>

    </body>
</html>
