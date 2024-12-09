@extends('layouts.base')

@section('title', 'Portfólio')

@section('content')
    <section class="intro py-5 text-center">
        <div class="container">
            <h1>Nosso Portfólio</h1>
            <p>Confira alguns dos projetos que realizamos e como transformamos o consumo de energia de nossos clientes com soluções eficientes e sustentáveis de energia solar.</p>
        </div>
    </section>

    @auth <!-- Se um funcionário estiver logado, mostra o botão para adicionar um novo projeto -->
        @if(auth()->user()->funcionario)
            <div class="container text-center mb-4">
                <a href="{{ route('portfolio.create') }}" class="btn btn-primary">Adicionar Novo Projeto</a>
            </div>
        @endif
    @endauth

    <section class="portfolio-list py-5">
        <div class="container">
            <h2>Projetos Recentes</h2>
            <div class="d-flex flex-wrap" style="gap: 45px;">
                @foreach($portfolios as $portfolio)
                    <div class="card" style="width: 18rem;">
                        <!-- Foto do projeto -->
                        <img src="{{ asset('storage/' . $portfolio->foto) }} " alt="foto_do_portfolio" class="card-img-top" style="height: 190px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $portfolio->titulo }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($portfolio->descricao, 150, '...') }}</p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Cidade:</strong> {{ $portfolio->cidade }}</li>
                            <li class="list-group-item"><strong>Potência:</strong> {{ $portfolio->potencia }} kWp</li>
                            <li class="list-group-item"><strong>Tipo:</strong> {{ $portfolio->tipo }}</li>
                            <li class="list-group-item"><strong>Economia:</strong> {{ $portfolio->economia }}%</li>
                        </ul>

                        @auth <!-- Se um funcionário estiver logado, mostra os botões de gerenciamento -->
                            @if(auth()->user()->funcionario == true)
                                <div class="card-footer text-center">
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
        </div>
    </section>

    <section class="info py-5 bg-light">
        <div class="container text-center">
            <h2>Por que escolher a energia solar?</h2>
            <p>A energia solar é uma forma limpa e econômica de gerar eletricidade, reduzindo custos e impactando positivamente o meio ambiente. Veja como nossas soluções de energia solar podem fazer a diferença para você também.</p>
            <a href="{{ route('empresa.contato') }}" class="btn btn-primary">Solicite uma Consultoria</a>
        </div>
    </section>
@endsection