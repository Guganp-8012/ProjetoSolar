@extends('layouts.base')

@section('title', $postagem->titulo)

@section('content')
    <p>{{ $postagem->categoria->nome }}</p>
    
    <h1>{{ $postagem->titulo }}</h1>
    
    <p>Publicado em: {{ \Carbon\Carbon::parse($postagem->data)->locale('pt_BR')->isoFormat('D [de] MMMM [de] YYYY') }} | Autor: {{ $postagem->user->name }}</p>

    <div>
        @if($postagem->foto)
            <img src="{{ asset('storage/' . $postagem->foto) }}" alt="Imagem da postagem" style="height: auto; width: 350px;">
        @endif
        <p>{{ $postagem->conteudo }}</p>
    </div>
    
    <!-- Exibindo Comentários -->
    <h3>Comentários</h3>
    @if($postagem->comentarios->count() > 0)
        @foreach($postagem->comentarios as $comentario)
            <div class="card">
                <div class="d-flex card-header justify-content-between">
                    <div>
                        <img src="{{ $comentario->user->foto }}" alt="foto do usuario">
                        <span>{{ $comentario->user->name }}</span>
                    </div>

                    <span>{{ $comentario->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="card-body">
                    <p>{{ $comentario->conteudo }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Ainda não há comentários nesta postagem</p>
    @endif
    
    <hr>

    <!-- Formulário de Comentário -->
    <div>
        @auth
            <form action="{{ route('comentario.store', ['postagem' => $postagem->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="conteudo">Comentário:</label>
                    <textarea name="conteudo" id="conteudo" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
        @else
            <h4>Por favor, <a href="#" data-toggle="modal" data-target="#loginModal">faça login</a> para comentar</h4>  
        @endauth
    </div>
@endsection