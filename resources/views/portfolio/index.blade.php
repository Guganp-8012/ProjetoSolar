@extends('layouts.base')

@section('title', 'Portfólio')

@section('content')
    <h1>Portfólio</h1>
    <div class="d-flex flex-wrap" style="gap: 20px;">
        @foreach($portfolios as $portfolio)
            <div class="card" style="width: 18rem;">
                @if($portfolio->fotos)
                    <img src="{{ asset('storage/' . $portfolio->fotos) }}" alt="Foto do portfólio" class="card-img-top" style="height: 190px; object-fit: cover;">
                @else
                    Sem foto
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $portfolio->titulo }}</h5>
                    <p class="card-text">{{ $portfolio->descricao }}</p>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Cidade:</strong> {{ $portfolio->cidade }}</li>
                    <li class="list-group-item"><strong>Potência:</strong> {{ $portfolio->potencia }} kWp</li>
                    <li class="list-group-item"><strong>Tipo:</strong> {{ ucfirst($portfolio->tipo) }}</li>
                    <li class="list-group-item"><strong>Economia:</strong> {{ $portfolio->economia }}%</li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection