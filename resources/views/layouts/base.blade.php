<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Título Padrão')</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                margin: 0;
            }
            .nav {
                background-color: #343a40; /* Cor do footer */
            }
            .nav-link {
                color: white !important;
            }
            footer {
                margin-top: auto; /* Empurra o footer para o final */
                background-color: #343a40;
                color: white;
            }
            .footer-link {
                color: #ffc107; /* Cor do link no footer */
            }
            .footer-link:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <ul class="nav justify-content-center" id="pills-tab" role="tablist" style="display: flex; width: 100%;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explorar+</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('servico.index') }}">Serviços</a>
                    <a class="dropdown-item" href="{{ route('empresa.sobre') }}">Nosso time</a>
                    <a class="dropdown-item" href="#simulador">Simulador</a>
                    <a class="dropdown-item" href="{{ route('FAQ.index') }}">Perguntas Frequentes</a>
                    <a class="dropdown-item" href="{{ route('politica-privacidade.index') }}">Política de privacidade</a>
                    <a class="dropdown-item" href="{{ route('error404') }}">Página 404</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('empresa.sobre') }}">Sobre Nós</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('portfolio.index') }}">Portfólio</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('empresa.contato') }}">Contatos</a>
            </li>

            @guest
                <button onclick="abrirModal()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                    Login
                </button>
            @endguest

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            @endauth
        </ul>

        <!-- Conteúdo -->
        <div class="container my-4">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center py-3">
            <span>&copy; 2024 Apollo Solar. Todos os direitos reservados. Criado por: 
                <a href="https://github.com/guganp-8012" class="footer-link" target="_blank">Guganp-8012</a>
            </span>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/javascript.js') }}"></script>
    </body>
</html>
