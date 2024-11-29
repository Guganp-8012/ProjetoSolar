@extends('layouts.base')

@section('title', 'Portfólio')

@section('content')
    <h1>Portfólio</h1>
    
    @auth
        @if(auth()->user()->funcionario)
            <a href="{{ route('portfolio.create') }}" class="btn btn-primary">Adicionar Projeto</a>
        @endif
    @endauth

    <div class="d-flex flex-wrap" style="gap: 45px;">
        @foreach($portfolios as $portfolio)
            <div class="card" style="width: 18rem;">
                @if($portfolio->foto)
                    <img src="{{ asset('storage/' . $portfolio->foto) }}" alt="Foto do portfólio" class="card-img-top" style="height: 190px; object-fit: cover;">
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

                @auth
                    @if(auth()->user()->funcionario == true)
                        <div class="card-footer">
                            <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection