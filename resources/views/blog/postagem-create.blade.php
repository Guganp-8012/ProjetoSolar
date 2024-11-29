@extends('layouts.base')

@section('title', 'Criar Postagem')

@section('content')
    <h2>Criar Postagem</h2>

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>

        <div class="form-group">
            <label for="conteudo">Conteúdo: </label>
            <textarea name="conteudo" id="conteudo" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="data">Data: </label>
            <input type="date" name="data" id="data" required>
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoria: </label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Autor: </label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar Postagem</button>
    </form>

    <a href="{{ route('blog.index') }}">
        <button class="btn btn-secondary">Voltar</button>
    </a>
@endsection