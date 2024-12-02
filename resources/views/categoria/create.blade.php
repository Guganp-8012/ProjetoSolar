@extends('layouts.base')

@section('title', 'Cadastrar Categoria')

@section('content')
    <h2>Cadastrar Categoria</h2>

    <form action="{{ route('categoria.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea type="text" name="descricao" id="descricao" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Criar Categoria</button>
    </form>

    <a href="{{ route('blog.index') }}">
        <button class="btn btn-secondary">Voltar</button>
    </a>
@endsection