@extends('layouts.base')

@section('title', 'Categoria: ' . $categoria->nome)

@section('content')
    <h1>Postagens da Categoria: {{ $categoria->nome }}</h1>

    @if($postagens->count() > 0)
        <div class="d-flex flex-wrap" style="gap: 45px;">
            @foreach($postagens as $postagem)
                <div class="card" style="width: 18rem;">
                    @if($postagem->foto)
                        <img src="{{ asset('storage/' . $postagem->foto) }}" alt="imagem do post" style="height: 190px; width: 100%; align-self: center;">
                    @else
                        Sem foto
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $postagem->titulo }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($postagem->conteudo, 176, '[...]') }}</p>
                        <a href="{{ route('blog.detalhes', $postagem->id) }}" class="btn btn-primary">Leia mais</a>
                    </div>

                    <div class="card-footer text-muted">
                        <span>{{ date('d/m/Y', strtotime($postagem->data)) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Não há postagens nesta categoria.</p>
    @endif
    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Criar Categoria</a>

    <a href="{{ route('blog.index') }}">
        <button class="btn btn-secondary">Voltar</button>
    </a>
@endsection
