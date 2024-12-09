@extends('layouts.base')

@section('title', 'Perguntas Frequentes')

@section('content')
    <div class="container">
        <h1>Perguntas Frequentes</h1>
        <p>Confira abaixo as perguntas mais comuns sobre energia solar e nossas respostas detalhadas.</p>

        <!-- Categoria 1: Funcionamento da Energia Solar -->
        <h2>Funcionamento da Energia Solar</h2>

        <!-- Pergunta 1 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                O que é energia solar e como ela funciona?
            </a>
        </p>
        <div class="collapse" id="collapse1">
            <div class="card card-body">
                A energia solar é obtida através da conversão da luz do sol em energia elétrica, utilizando painéis fotovoltaicos que captam os raios solares e geram eletricidade.
            </div>
        </div>

        <!-- Pergunta 2 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                Quais são os benefícios de usar energia solar?
            </a>
        </p>
        <div class="collapse" id="collapse2">
            <div class="card card-body">
                - Redução da conta de luz.<br>
                - Energia sustentável e limpa.<br>
                - Valorização do imóvel.<br>
                - Independência energética.
            </div>
        </div>

        <!-- Pergunta 3 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                Qual a diferença entre um sistema on-grid e off-grid?
            </a>
        </p>
        <div class="collapse" id="collapse3">
            <div class="card card-body">
                On-grid está conectado à rede elétrica, enquanto off-grid é independente e utiliza baterias para armazenar energia.
            </div>
        </div>

        <!-- Categoria 2: Aspectos Práticos da Instalação -->
        <h2>Aspectos Práticos da Instalação</h2>

        <!-- Pergunta 4 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                A energia solar funciona em dias nublados ou chuvosos?
            </a>
        </p>
        <div class="collapse" id="collapse4">
            <div class="card card-body">
                Sim, mas com eficiência reduzida. Mesmo em dias nublados, a luz solar difusa pode ser aproveitada.
            </div>
        </div>

        <!-- Pergunta 5 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse5" role="button" aria-expanded="false" aria-controls="collapse5">
                Preciso de permissão para instalar um sistema de energia solar?
            </a>
        </p>
        <div class="collapse" id="collapse5">
            <div class="card card-body">
                Sim, normalmente é necessário obter aprovação da distribuidora de energia local para conectar o sistema à rede elétrica.
            </div>
        </div>

        <!-- Pergunta 6 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse6" role="button" aria-expanded="false" aria-controls="collapse6">
                Quanto tempo leva para instalar o sistema de energia solar?
            </a>
        </p>
        <div class="collapse" id="collapse6">
            <div class="card card-body">
                A instalação geralmente leva de 1 a 3 dias, mas a aprovação e conexão à rede elétrica podem demorar algumas semanas.
            </div>
        </div>

        <!-- Categoria 3: Custos e Benefícios -->
        <h2>Custos e Benefícios</h2>

        <!-- Pergunta 7 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse7" role="button" aria-expanded="false" aria-controls="collapse7">
                Quanto custa, em média, um sistema de energia solar?
            </a>
        </p>
        <div class="collapse" id="collapse7">
            <div class="card card-body">
                O custo pode variar entre R$ 15.000 e R$ 50.000, dependendo do tamanho e da capacidade do sistema.
            </div>
        </div>

        <!-- Pergunta 8 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse8" role="button" aria-expanded="false" aria-controls="collapse8">
                Em quanto tempo o investimento em energia solar se paga?
            </a>
        </p>
        <div class="collapse" id="collapse8">
            <div class="card card-body">
                O retorno financeiro geralmente ocorre entre 4 a 7 anos, dependendo do consumo de energia e do custo local.
            </div>
        </div>

        <!-- Categoria 4: Manutenção e Vida Útil -->
        <h2>Manutenção e Vida Útil</h2>

        <!-- Pergunta 9 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse9" role="button" aria-expanded="false" aria-controls="collapse9">
                Qual a vida útil de um sistema de energia solar?
            </a>
        </p>
        <div class="collapse" id="collapse9">
            <div class="card card-body">
                Os painéis solares têm uma vida útil média de 25 a 30 anos, enquanto os inversores duram cerca de 10 a 15 anos.
            </div>
        </div>

        <!-- Pergunta 10 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse10" role="button" aria-expanded="false" aria-controls="collapse10">
                A manutenção dos painéis solares é cara?
            </a>
        </p>
        <div class="collapse" id="collapse10">
            <div class="card card-body">
                Não, a manutenção é simples e inclui principalmente a limpeza regular, geralmente realizada uma ou duas vezes por ano.
            </div>
        </div>

        <!-- Pergunta 11 -->
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse11" role="button" aria-expanded="false" aria-controls="collapse11">
                O que acontece com o excesso de energia gerada?
            </a>
        </p>
        <div class="collapse" id="collapse11">
            <div class="card card-body">
                O excesso de energia é enviado para a rede elétrica, gerando créditos que podem ser usados em meses subsequentes.
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar para a página inicial</a>

        <div class="mt-5 p-4 bg-light rounded text-center">
            <h3>Tem dúvidas mais específicas?</h3>
            <p>Se você não encontrou a resposta que procurava, nossa equipe está pronta para ajudar. Entre em contato conosco para uma consultoria personalizada!</p>
            <a href="{{ route('empresa.contato') }}" class="btn btn-primary">Ir para a página de contato</a>
        </div>
    </div>
@endsection
