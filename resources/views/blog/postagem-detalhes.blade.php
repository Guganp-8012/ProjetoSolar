@extends('layouts.base')

@section('title', $postagem->titulo)

@section('content')
    <p><a href="{{ route('blog.index') }}"><button class="btn btn-secondary" style="margin-top: 10px;">Voltar</button></a></p>

    <a href="{{ route('categoria.show', $postagem->categoria->id) }}" style="text-decoration: none;">{{ $postagem->categoria->nome }}</a>
    
    <h1>{{ $postagem->titulo }}</h1>
    
    <p>Publicado em: {{ \Carbon\Carbon::parse($postagem->data)->locale('pt_BR')->isoFormat('D [de] MMMM [de] YYYY') }} | Autor: {{ $postagem->user->name }}</p>

    <div>
        @if($postagem->foto)
            <img src="{{ asset('storage/' . $postagem->foto) }}" alt="foto_do_post" style="height: auto; width: 350px;">
        @endif

        <p>{{ $postagem->conteudo }}</p>
    </div>

    <!-- Outras Postagens -->
    <h3>Posts Recentes</h3>
    
    <div class="list-group">
        @foreach($postsRecentes as $postRecente)
            <a href="{{ route('blog.detalhes', $postRecente->id) }}" class="list-group-item list-group-item-action d-flex align-items-start">
                <img src="{{ $postRecente->foto }}" alt="foto_do_post" class="img-thumbnail me-3" style="width: 64px; height: 64px; object-fit: cover;">

                <div>
                    <h5 class="mb-1">{{ $postRecente->titulo }}</h5>
                    <small class="text-muted">{{ date('d/m/Y', strtotime($postagem->data)) }}</small>
                </div>
            </a>
        @endforeach
    </div>

    
    <!-- Exibindo Comentários -->
    <h3>Comentários</h3>
    @if($postagem->comentarios->count() > 0)
        @foreach($postagem->comentarios as $comentario)
            <div class="card">
                <div class="d-flex card-header justify-content-between">
                    <div>
                    <img src="{{ $comentario->user->foto }}" alt="foto_do_usuario" class="img-thumbnail me-3" style="width: 64px; height: 64px; object-fit: cover;">
                        <span>{{ $comentario->user->name }}</span>
                    </div>

                    <div>
                        <span>{{ $comentario->created_at->format('d/m/Y H:i') }}</span>

                        @auth <!-- Se alguém estiver logado, mostra os botões de gerenciamento -->
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
        @endforeach
    @else
        <p>Ainda não há comentários nesta postagem</p>
    @endif

    <hr>

    <!-- Formulário de Comentário -->
    <div>
        @auth <!-- Se alguém estiver logado, mostra o formulário de comentário -->
            <form id="comentario-form" action="{{ route('comentario.store', ['postagem' => $postagem->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="conteudo">Comentário:</label>
                    <textarea name="conteudo" id="conteudo" class="form-control" placeholder="Digite seu comentário" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
        @endauth

        @guest <!-- Se ninguém estiver logado, mostra o botão de login -->
            <h4>Faça <a href="#" data-toggle="modal" data-target="#loginModal">login</a> para comentar.</h4>  
        @endguest
    </div>
@endsection