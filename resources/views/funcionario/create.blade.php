@extends('layouts.base')

@section('title', 'Cadastrar Funcionário')

@section('content')
    <div class="container">
        <h1>Cadastrar Funcionário</h1>
        
        <form action="{{ route('funcionario.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" id="foto" name="foto">
            </div>

            <div class="form-group">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone">
            </div>

            <div class="form-group">
                <label for="ocupacao" class="form-label">Ocupação</label>
                <input type="text" class="form-control" id="ocupacao" name="ocupacao">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <a href="{{ route('empresa.sobre') }}"><button class="btn btn-secondary" style="margin-top: 10px;">Voltar</button></a>
    </div>
@endsection