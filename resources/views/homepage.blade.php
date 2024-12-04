@extends('layouts.base')

@section('title', 'Apollo Solar - Página Inicial')

@section('content')
    <section class="hero">
        <div class="container text-center">
            <h1>Bem-vindo à Apollo Solar</h1>
            <p>Transforme sua casa ou empresa com energia limpa, eficiente e sustentável!</p>
            <a href="#servicos" class="btn btn-primary">Saiba mais sobre nossos serviços</a>
        </div>
    </section>

    <section id="sobre" class="py-5">
        <div class="container">
            <h2>Sobre Nós</h2>
            <p>A Apollo Solar é especializada em soluções de energia solar para residências e empresas. Nosso compromisso é ajudar nossos clientes a reduzir os custos com energia elétrica enquanto contribuem para um futuro mais sustentável. Com uma equipe de profissionais qualificados e tecnologia de ponta, oferecemos consultoria personalizada e serviços de instalação de sistemas fotovoltaicos.</p>
        </div>
    </section>

    <section id="servicos" class="bg-light py-5">
        <div class="container">
            <h2>Nossos Serviços</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Consultoria Especializada</h5>
                            <p class="card-text">Oferecemos uma análise detalhada do seu consumo energético para apresentar a melhor solução de energia solar, ajustada às suas necessidades específicas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Instalação de Sistemas Fotovoltaicos</h5>
                            <p class="card-text">Realizamos a instalação de sistemas fotovoltaicos de alta performance, com garantia de qualidade e eficiência para maximizar a economia de energia.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('servico.index') }}" class="btn btn-link">Ver Mais</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manutenção e Limpeza de Painéis Solares</h5>
                            <p class="card-text">Garantimos o funcionamento eficiente dos seus painéis solares com serviços de manutenção preventiva e limpeza, prolongando a vida útil dos equipamentos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="depoimentos" class="py-5">
        <div class="container">
            <h2>O que nossos clientes dizem</h2>

            @if($depoimentos->count() > 0)
                <div class="row">
                    @foreach($depoimentos as $depoimento)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">"{{ $depoimento->texto }}"</p>
                                    <strong>{{ $depoimento->user->name }}</strong>
                                    <span class="text-muted"> em {{ $depoimento->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Nenhum depoimento disponível.</p>
            @endif
        </div>
    </section>

    <section id="contato" class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2>Entre em contato</h2>
            <p>Tem dúvidas sobre como começar a economizar com energia solar? Fale conosco e agende uma consultoria personalizada!</p>
            <a href="{{ route('empresa.contato') }}" class="btn btn-light">Fale conosco</a>
        </div>
    </section>
@endsection