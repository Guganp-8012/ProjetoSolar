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
                        <img src="{{ $comentario->user->foto }}" alt="foto_do_usuario">
                        <span>{{ $comentario->user->name }}</span>
                    </div>

                    <div>
                        <span>{{ $comentario->created_at->format('d/m/Y H:i') }}</span>

                        @auth
                            <!-- Botão de Editar -->
                            <button class="btn btn-primary editar-comentario" data-id="{{ $comentario->id }}" data-conteudo="{{ $comentario->conteudo }}" data-toggle="modal" data-target="#editarComentarioModal">Editar</button>

                            <!-- Botão de Excluir -->
                            <form action="{{ route('comentario.destroy', $comentario->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ $comentario->conteudo }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Ainda não há comentários nesta postagem</p>
    @endif

    <!-- Modal de Edição -->
    <div class="modal fade" id="editarComentarioModal" tabindex="-1" aria-labelledby="editarComentarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarComentarioModalLabel">Editar Comentário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Formulário Edição de Comentário -->
                <form id="editar-comentario-form" action="{{ route('comentario.update', $comentario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="conteudo">Comentário:</label>
                            <textarea name="conteudo" id="conteudo" class="form-control" placeholder="Digite seu comentário" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> <!-- ajeitar -->
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('editar-comentario-form').submit()">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <!-- Formulário de Comentário -->
    <div>
        @auth
            <form id="comentario-form" action="{{ route('comentario.store', ['postagem' => $postagem->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="conteudo">Comentário:</label>
                    <textarea name="conteudo" id="conteudo" class="form-control" placeholder="Digite seu comentário" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
        @endauth

        @guest
            <h4>Faça <a href="#" data-toggle="modal" data-target="#loginModal">login</a> para comentar.</h4>  
        @endguest
    </div>
@endsection