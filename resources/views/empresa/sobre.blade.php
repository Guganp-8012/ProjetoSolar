@extends('layouts.base')

@section('title', 'Sobre Nós')

@section('content')
    <div class="container py-5">
        <!-- Seção de Introdução -->
        <section class="mb-5 text-center">
            <h1 class="mb-4">Sobre a Apollo Solar</h1>
            <p class="lead">Na Apollo Solar, acreditamos que o futuro é movido por energia limpa e sustentável. Nossa missão é oferecer soluções de energia solar que transformam residências e empresas, unindo tecnologia de ponta e atendimento personalizado para criar um impacto positivo no meio ambiente.</p>
        </section>

        <!-- Conheça nossa equipe -->
        <section class="mb-5">
            <h2 class="mb-4 text-center">Conheça nossa equipe</h2>
            <p class="text-center mb-5">Contamos com profissionais altamente qualificados, comprometidos em oferecer o melhor serviço e atendimento. Cada membro do time traz uma combinação única de expertise e paixão por energia sustentável.</p>
            
            @auth <!-- Se um funcionário estiver logado, mostra o botão para adicionar um novo projeto -->
                @if(auth()->user()->funcionario)
                    <div class="container text-center mb-4">
                        <a href="{{ route('funcionario.create') }}" class="btn btn-primary">Cadastrar Novo Funcionário</a>
                    </div>
                @endif
            @endauth
            
            <div class="d-flex flex-wrap justify-content-center gap-4">
                @foreach($funcionarios as $funcionario) <!-- Se um usuário for um funcionário, mostra na lista da equipe -->
                    @if($funcionario->funcionario == true)
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $funcionario->foto) }}" class="card-img-top" alt="{{ $funcionario->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $funcionario->name }}</h5>
                                <p class="card-text text-muted">{{ $funcionario->ocupacao }}</p>
                            </div>
                                @auth <!-- Se um funcionário estiver logado, mostra os botões de gerenciamento -->
                                    @if(auth()->user()->funcionario == true)
                                        <div class="card-footer d-flex justify-content-around">
                                            <a href="{{ route('funcionario.edit', $funcionario->id) }}" class="btn btn-secondary">Editar Funcionário</a>

                                            <form action="{{ route('funcionario.destroy', $funcionario->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                        </div>
                    @endif
                @endforeach


            </div>
        </section>

        <hr>

        <!-- Patrocinadores -->
        <section class="mb-5">
            <h2 class="mb-4 text-center">Nossos Patrocinadores</h2>
            <p class="text-center mb-5">Temos o orgulho de contar com o apoio de parceiros que compartilham da nossa visão de um futuro mais sustentável. Juntos, estamos impulsionando a transformação energética no Brasil.</p>
            <div class="d-flex flex-wrap justify-content-center" style="gap: 45px;">
                <div class="card" style="width: 18rem;">
                    <img src="https://placehold.jp/3d4070/ffffff/150x150.png" class="card-img-top" alt="patrocinador">
                    <div class="card-body">
                        <h5 class="card-title">Patrocinador 1</h5>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="https://placehold.jp/3d4070/ffffff/150x150.png" class="card-img-top" alt="patrocinador">
                    <div class="card-body">
                        <h5 class="card-title">Patrocinador 2</h5>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="https://placehold.jp/3d4070/ffffff/150x150.png" class="card-img-top" alt="patrocinador">
                    <div class="card-body">
                        <h5 class="card-title">Patrocinador 3</h5>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection