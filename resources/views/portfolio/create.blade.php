@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Criar Novo Portfólio</h1>

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
            <label for="foto">Foto</label>
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
                <option value="residencial">Residencial</option>
                <option value="comercial">Comercial</option>
                <option value="industrial">Industrial</option>
                <option value="rural">Rural</option>
                <option value="publico">Público/Institucional</option>
                <option value="hibrido">Híbrido</option>
                <option value="off-grid">Autônomo</option>
                <option value="on-grid">Conectado a Rede</option>
            </select>
        </div>

        <div class="form-group">
            <label for="economia">Economia (%)</label>
            <input type="number" id="economia" name="economia" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Projeto para Portfólio</button>
    </form>
</div>
@endsection