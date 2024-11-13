<!--listagem de postagens e categorias, posts recentes-->

@extends('layouts.base')

@section('title', 'Blog')

@section('content')
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

    <div class="d-flex flex-wrap justify-content-center" style="gap: 45px;">
        @foreach($postagens as $postagem)
            <a href="{{ route('blog.postagem-detalhes', $postagem->id) }}">
                <div class="card" style="width: 18rem;">
                    @if($postagem->foto)
                        <img src="{{ asset('storage/' . $postagem->foto) }}" alt="imagem do post" style="max-width: 100px; max-height: 100px; align-self:center;">
                    @else
                        Sem foto
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $postagem->titulo }}</h5>

                        <p class="card-text">{{ $postagem->conteudo }}</p>
                    </div>

                    <div class="card-footer text-muted">
                        <span>
                            @if($postagem->data)
                                {{ date('d/m/Y', strtotime($postagem->data)) }}
                            @else
                                Data Indisponível
                            @endif
                        </span>
                        <span>•</span>
                        <span>{{ $postagem->categoria->nome }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection