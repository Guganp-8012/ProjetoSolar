@extends('layouts.base')

@section('title', 'Apollo Solar - Serviços')

@section('content')
    <section class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Serviços de Energia Solar</h1>
            <p>Oferecemos soluções personalizadas para você economizar e investir em energia limpa e sustentável.</p>
        </div>
    </section>

    <section id="servicos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nossos Serviços</h2>
            <div class="row">
                <!-- Consultoria Especializada -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="consultoria-imagem.jpg" class="card-img-top" alt="Consultoria Especializada">
                        <div class="card-body">
                            <h5 class="card-title">Consultoria Especializada</h5>
                            <p class="card-text">Analisamos seu consumo de energia para desenvolver a solução de energia solar mais eficaz e personalizada para sua residência ou empresa.</p>
                            <a href="#consultoria" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <!-- Instalação de Sistemas Fotovoltaicos -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="instalacao-imagem.jpg" class="card-img-top" alt="Instalação de Sistemas Fotovoltaicos">
                        <div class="card-body">
                            <h5 class="card-title">Instalação de Sistemas Fotovoltaicos</h5>
                            <p class="card-text">Realizamos a instalação de sistemas fotovoltaicos de alta eficiência, com equipamentos de qualidade para garantir economia e durabilidade no seu investimento.</p>
                            <a href="#instalacao" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <!-- Manutenção e Limpeza -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="manutencao-imagem.jpg" class="card-img-top" alt="Manutenção e Limpeza">
                        <div class="card-body">
                            <h5 class="card-title">Manutenção e Limpeza de Painéis</h5>
                            <p class="card-text">Oferecemos serviços de manutenção preventiva e limpeza para garantir o desempenho contínuo e prolongar a vida útil dos seus painéis solares.</p>
                            <a href="#manutencao" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detalhamento dos Serviços -->
            <div id="consultoria" class="mt-5">
                <h3>Consultoria Especializada</h3>
                <p>Com a nossa consultoria especializada, você recebe um planejamento energético detalhado para identificar as melhores opções de sistema fotovoltaico, adaptados ao seu consumo e orçamento. Avaliamos seu histórico de consumo, tipo de imóvel e localização para garantir o máximo aproveitamento da energia solar.</p>
            </div>

            <div id="instalacao" class="mt-5">
                <h3>Instalação de Sistemas Fotovoltaicos</h3>
                <p>Nossos sistemas fotovoltaicos são compostos por módulos de alta qualidade, que são instalados por uma equipe técnica altamente qualificada. Após a instalação, realizamos testes rigorosos para garantir que tudo esteja funcionando corretamente e conforme as normas de segurança e eficiência.</p>
            </div>

            <div id="manutencao" class="mt-5">
                <h3>Manutenção e Limpeza de Painéis Solares</h3>
                <p>A manutenção e limpeza dos seus painéis solares são essenciais para garantir que eles funcionem a sua capacidade máxima. Oferecemos serviços periódicos de limpeza e manutenção para que seu sistema continue gerando energia com eficiência, reduzindo o risco de falhas e aumentando a durabilidade dos equipamentos.</p>
            </div>
        </div>
    </section>

    <section id="depoimentos" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">O que nossos clientes dizem</h2>

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
                <p class="text-center">Nenhum depoimento disponível.</p>
            @endif
        </div>
    </section>

    <section id="contato" class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2>Entre em contato</h2>
            <p>Se você tem dúvidas sobre os nossos serviços ou quer saber mais sobre como podemos ajudar a reduzir seus custos com energia, entre em contato conosco!</p>
            <a href="{{ route('empresa.contato') }}" class="btn btn-light">Fale Conosco</a>
        </div>
    </section>
@endsection