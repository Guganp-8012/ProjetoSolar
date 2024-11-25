@extends('layouts.base')

@section('title', 'Serviços')

@section('content')
    <h1>Serviços</h1>

    listar os tipos de Serviços segurança, qualidade, depoimentos

    <hr>

    <h3>Deixe seu depoimento!</h3>

    @auth
        <!-- Formulário para Criar um Depoimento -->
        <form action="{{ route('depoimento.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="texto" id="texto" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    @else
        <p>Faça <a href="#" data-toggle="modal" data-target="#loginModal">login</a> para deixar seu depoimento.</p>
    @endauth

    <hr>

    <h3>O que nossos clientes dizem</h3>
    @if($depoimentos->count() > 0)
        @foreach($depoimentos as $depoimento)
            <div class="card my-3">
                <div class="card-body">
                    <p>{{ $depoimento->texto }}</p>
                    <img src="{{ $depoimento->user->foto }}" alt="foto_do_usuario">
                    <strong>{{ $depoimento->user->name }}</strong>
                    <span class="text-muted"> em {{ $depoimento->created_at->format('d/m/Y') }}</span>

                    @auth
                        <!-- Botão de Editar -->
                        <button class="btn btn-primary editar-depoimento" data-id="{{ $depoimento->id }}" data-texto="{{ $depoimento->texto }}" data-toggle="modal" data-target="#editarDepoimentoModal">Editar</button>

                        <!-- Botão de Excluir -->
                        <form action="{{ route('depoimento.destroy', $depoimento->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    @endauth
                </div>
            </div>
        @endforeach
    @else
        <p>Nenhum depoimento disponível.</p>
    @endif

    <!-- Modal de Edição de Depoimento -->
    <div class="modal fade" id="editarDepoimentoModal" tabindex="-1" aria-labelledby="editarDepoimentoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarDepoimentoModalLabel">Editar Depoimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Formulário de Edição do Depoimento -->
                <form id="editar-depoimento-form" action="{{ route('depoimento.update', $depoimento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="texto">Depoimento:</label>
                            <textarea name="texto" id="texto" class="form-control" placeholder="Digite seu depoimento" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> <!-- ajeitar -->
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('editar-depoimento-form').submit()">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection