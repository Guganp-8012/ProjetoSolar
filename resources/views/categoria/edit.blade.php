@extends('layouts.base')

@section('title', 'Editar Categoria')

@section('content')
    <h2>Editar Categoria</h2>

    <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $categoria->nome }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required>{{ $categoria->descricao }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Categoria</button>
    </form>

    <a href="{{ route('categoria.index') }}">
        <button class="btn btn-secondary">Voltar</button>
    </a>
@endsection