@extends('layouts.base')

@section('title', 'Categorias')

@section('content')
    <h1>Listagem de Categorias</h1>
    
    <div class="list-group">
        @foreach($categorias as $categoria)
            <a href="{{ route('categoria.show', $categoria->id) }}" class="list-group-item list-group-item-action">
                <h5 class="mb-1">{{ $categoria->nome }}</h5>
                <p class="mb-1">{{ $categoria->descricao }}</p>
            </a>

            <div class="d-flex">
                <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-secondary btn-sm">Editar</a>

                <!-- Formulário de Exclusão -->
                <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </div>
        @endforeach
    </div>

    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Criar Categoria</a>
    <a href="{{ route('blog.index') }}" class="btn btn-secondary">Voltar</a>
@endsection