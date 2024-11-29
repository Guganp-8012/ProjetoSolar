@extends('layouts.base')

@section('title', $portfolio->titulo)

@section('content')
    <h1>{{ $portfolio->titulo }}</h1>
    <p>{{ $portfolio->descricao }}</p>

    <div>
        <h3>Detalhes do Projeto</h3>
        <ul>
            <li><strong>Cidade:</strong> {{ $portfolio->cidade }}</li>
            <li><strong>Potência:</strong> {{ $portfolio->potencia }} kWp</li>
            <li><strong>Tipo:</strong> {{ ucfirst($portfolio->tipo) }}</li>
            <li><strong>Economia:</strong> {{ $portfolio->economia }}%</li>
        </ul>
    </div>

    @if($portfolio->fotos)
        <div>
            <h3>Fotos do Projeto</h3>
            <img src="{{ asset('storage/' . $portfolio->fotos) }}" alt="Fotos do Projeto" style="max-width: 100%; height: auto;">
        </div>
    @else
        <p>Sem fotos disponíveis para este projeto.</p>
    @endif

    <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Voltar para o Portfólio</a>
@endsection
