<!--listagem de postagens e categorias, posts recentes-->

@extends('layouts.base')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    <div class="d-flex flex-wrap" style="gap: 45px;">
        @foreach($postagens as $postagem)
            <a href="{{ route('blog.detalhes', $postagem->id) }}" style="text-decoration: none;">
                <div class="card" style="width: 18rem;">
                    @if($postagem->foto)
                        <img src="{{ asset('storage/' . $postagem->foto) }}" alt="imagem do post" style="height: 190px; width: 100%; align-self: center;">
                    @else
                        Sem foto
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $postagem->titulo }}</h5>
            </a>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($postagem->conteudo, 176, '[...]') }}</p>
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
                        <a href="#categoria" style="text-decoration: none;">{{ $postagem->categoria->nome }}</a>
                    </div>
                </div>
        @endforeach
    </div>
@endsection