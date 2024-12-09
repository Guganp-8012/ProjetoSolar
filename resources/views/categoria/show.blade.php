@extends('layouts.base')

@section('title', 'Categoria: ' . $categoria->nome)

@section('content')
    <h1>Postagens da categoria: {{ $categoria->nome }}</h1>

    <p>{{ $categoria->descricao }}</p>

    @auth <!-- Se um funcionário estiver logado, mostra os botões de gerenciamento -->
        @if(auth()->user()->funcionario == true)
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Criar Postagem</a>
            
            <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-secondary">Editar Categoria</a>

            <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Ver Categorias</a>

            <!-- Formulário de Exclusão -->
            <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" style="margin-top: 10px; margin-bottom: 10px">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir Categoria</button>
            </form>
        @endif
    @endauth

    @if($postagens->count() > 0)
        <div class="d-flex flex-wrap" style="gap: 45px;">
            @foreach($postagens as $postagem)
                <a href="{{ route('blog.detalhes', $postagem->id) }}">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $postagem->foto) }}" alt="imagem_do_post" style="height: 190px; width: 100%; align-self: center;">
                
                        <div class="card-body">
                            <h5 class="card-title">{{ $postagem->titulo }}</h5>
                </a>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($postagem->conteudo, 176, '[...]') }}</p>
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
    
    <a href="{{ route('blog.index') }}"><button class="btn btn-secondary" style="margin-top: 10px;">Voltar</button></a>
@endsection
