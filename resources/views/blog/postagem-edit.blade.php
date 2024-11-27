@extends('layouts.base')

@section('title', 'Editar Postagem')

@section('content')
    <h2>Editar Postagem</h2>

    <form action="{{ route('blog.update', $postagem->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" value="{{ $postagem->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto Atual:</label>
            <img src="{{ asset('storage/' . $postagem->foto) }}" alt="Foto da Postagem" class="img-thumbnail" style="max-width: 150px;">
            <br>
            <label for="foto">Nova Foto:</label>
            <input type="file" name="foto" id="foto">
        </div>

        <div class="form-group">
            <label for="conteudo">Conteúdo: </label>
            <textarea name="conteudo" id="conteudo" required>{{ $postagem->conteudo }}</textarea>
        </div>

        <div class="form-group">
            <label for="data">Data: </label>
            <input type="date" name="data" id="data" value="{{ date('d/m/Y', strtotime($postagem->data)) }}" required>
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoria: </label>
            <select name="categoria_id" id="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($postagem->categoria_id == $categoria->id) selected @endif>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Autor: </label>
            <select name="user_id" id="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($postagem->user_id == $user->id) selected @endif>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <a href="{{ route('blog.index') }}">
        <button class="btn btn-secondary">Voltar</button>
    </a>
@endsection