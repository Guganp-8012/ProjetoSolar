@extends('layouts.base')

@section('title', 'Registrar Projeto para Portfólio')

@section('content')
<div class="container">
    <h1>Registrar Projeto para Portfólio</h1>

    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="potencia">Potência (kW)</label>
            <input type="number" id="potencia" name="potencia" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="" disabled selected>Escolha o tipo do projeto</option>
                <option value="Residencial">Residencial</option>
                <option value="Comercial">Comercial</option>
                <option value="Industrial">Industrial</option>
                <option value="Rural">Rural</option>
                <option value="Publico">Público/Institucional</option>
                <option value="Hibrido">Híbrido</option>
                <option value="Autônomod">Autônomo</option>
                <option value="Conectado a Rede">Conectado a Rede</option>
            </select>
        </div>

        <div class="form-group">
            <label for="economia">Economia (%)</label>
            <input type="number" id="economia" name="economia" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Projeto</button>  
    </form>

    <a href="{{ route('portfolio.index') }}"><button class="btn btn-secondary" style="margin-top: 10px;">Voltar</button></a>
</div>
@endsection