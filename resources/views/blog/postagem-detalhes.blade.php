@extends('layouts.base')

@section('title', $postagem->titulo)

@section('content')
    <h1>{{ $postagem->titulo }}</h1>
    
    <p><strong>Publicado em:</strong> {{ date('d/m/Y', strtotime($postagem->data)) }}</p>
    
    <p><strong>Autor:</strong> {{ $postagem->user->name }}</p>

    <p><strong>Categoria:</strong> {{ $postagem->categoria->nome }}</p>

    <div class="postagem-conteudo">
        @if($postagem->foto)
            <img src="{{ asset('storage/' . $postagem->foto) }}" alt="Imagem da postagem" style="max-width: 100%;">
        @endif
        <p>{{ $postagem->conteudo }}</p>
    </div>

    <a href="{{ route('blog.index') }}" class="btn btn-primary">Voltar ao Blog</a>
@endsection