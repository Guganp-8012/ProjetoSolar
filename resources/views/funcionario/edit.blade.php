@extends('layouts.base')

@section('title', 'Editar Funcionário')

@section('content')
<div class="container">
    <h1>Editar Funcionário</h1>

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $funcionario->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $funcionario->email }}" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto Atual:</label>
            <img src="{{ asset('storage/' . $funcionario->foto) }}" alt="foto_atual" class="img-thumbnail" style="max-width: 150px;">
            <br>
            <label for="foto">Nova Foto:</label>
            <input type="file" id="foto" name="foto" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" value="{{ $funcionario->telefone }}">
        </div>

        <div class="form-group">
            <label for="ocupacao">Ocupação</label>
            <input type="text" id="ocupacao" name="ocupacao" class="form-control" value="{{ $funcionario->ocupacao }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Funcionário</button>
    </form>

    <a href="{{ route('empresa.sobre') }}"><button class="btn btn-secondary" style="margin-top: 10px;">Voltar</button></a>
</div>
@endsection