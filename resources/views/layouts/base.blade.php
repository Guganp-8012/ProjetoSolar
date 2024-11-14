<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Título Padrão')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <body>
        <ul class="nav justify-content-center" id="pills-tab" role="tablist" style="display: flex; width: 100%;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}">Home</a>
            </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explorar+</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('servico.index') }}">Serviços</a>
                    <a class="dropdown-item" href="{{ route('empresa.sobre') }}">Nosso time</a>
                    <a class="dropdown-item" href="#simulador">Simulador</a>
                    <a class="dropdown-item" href="{{ route('FAQ.index') }}">Perguntas Frequentes</a>
                    <a class="dropdown-item" href="{{ route('politica-privacidade.index') }}">Política de privacidade</a>
                    <a class="dropdown-item" href="#">Página 404</a>  <!-- ## -->
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Sobre Nós</a> <!-- empresa/sobre -->
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#portifolio">Portfólio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('empresa.contato') }} ">Contatos</a>
            </li>
        </ul>

<!--adicionar o botão de login para todas as views-->
    
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/javascript.js') }}"></script>
</html>