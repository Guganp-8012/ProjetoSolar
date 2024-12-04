@extends('layouts.base')

@section('title', 'Sobre Nós')

@section('content')
    <h1>Sobre a Apollo Solar</h1>

    <p>A Apollo Solar é uma empresa especializada em soluções de energia solar, focada em transformar residências e empresas por meio de energia limpa e sustentável. Desde o nosso início, buscamos oferecer soluções personalizadas e de alta qualidade para nossos clientes, com um time especializado e comprometido com a excelência.</p>

    <h3>Conheça nossa equipe</h3>

    <div class="d-flex flex-wrap" style="gap: 45px;">
        @foreach($users as $user)
            @if($user->funcionario == true)
                <div class="card" style="width: 18rem;">
                    <!-- <img src="{{ asset('storage/' . $user->foto) }}" class="card-img-top" alt="foto_do_usuario"> -->
                    <img src="https://i.pinimg.com/736x/0a/bb/a1/0abba119ad6bc5bc6e70388f99ccb3c6.jpg" class="card-img-top" alt="foto_do_usuario">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->ocupacao }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <h3>Nossos Patrocinadores</h3>
    <p>Temos o orgulho de contar com o apoio de parceiros que acreditam em nossa missão de transformar o futuro com energia solar.</p>
    
    <div class="d-flex flex-wrap" style="gap: 45px;">
        <div class="card" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="patrocinador">
            <div class="card-body">
                <h5 class="card-title">Patrocinador 1</h5>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="patrocinador">
            <div class="card-body">
                <h5 class="card-title">Patrocinador 2</h5>
            </div>
        </div>
    </div>
@endsection