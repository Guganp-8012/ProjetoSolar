@extends('layouts.base')

@section('title', 'Editar Projeto de Portfólio')

@section('content')
<div class="container">
    <h1>Editar Projeto de Portfólio</h1>

    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $portfolio->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control">{{ $portfolio->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="foto">Foto Atual:</label>
            <img src="{{ asset('storage/' . $portfolio->foto) }}" alt="foto_atual" class="img-thumbnail" style="max-width: 150px;">
            <br>
            <label for="foto">Nova Foto:</label>
            <input type="file" name="foto" id="foto">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade" class="form-control" value="{{ $portfolio->cidade }}" required>
        </div>

        <div class="form-group">
            <label for="potencia">Potência (kW)</label>
            <input type="number" id="potencia" name="potencia" class="form-control" value="{{ $portfolio->potencia }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="" disabled>Escolha o tipo do projeto</option>

                <option value="Residencial" @if($portfolio->tipo == 'residencial') selected @endif>Residencial</option>

                <option value="Comercial" @if($portfolio->tipo == 'comercial') selected @endif>Comercial</option>
                
                <option value="Industrial" @if($portfolio->tipo == 'industrial') selected @endif>Industrial</option>
                
                <option value="Rural" @if($portfolio->tipo == 'rural') selected @endif>Rural</option>
                
                <option value="Publico" @if($portfolio->tipo == 'publico') selected @endif>Público/Institucional</option>
                
                <option value="Hibrido" @if($portfolio->tipo == 'hibrido') selected @endif>Híbrido</option>
                
                <option value="Autônomo" @if($portfolio->tipo == 'off-grid') selected @endif>Autônomo</option>
                
                <option value="Conectado a Rede" @if($portfolio->tipo == 'on-grid') selected @endif>Conectado a Rede</option>
            </select>
        </div>

        <div class="form-group">
            <label for="economia">Economia (%)</label>
            <input type="number" id="economia" name="economia" class="form-control" value="{{ $portfolio->economia }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Projeto</button>
    </form>

    <a href="{{ route('portfolio.index') }}"><button class="btn btn-secondary" style="margin-top: 10px;">Voltar</button></a>
</div>
@endsection