<!-- Nossa história, Sobre, Funcionários?, Patrocionios -->

@extends('layouts.base')

@section('title', 'Sobre Nós')

@section('content')
    <h1>Sobre</h1>
    <h3>Conheça nossa equipe</h3>

    <div class="d-flex flex-wrap" style="gap: 45px;">
        @foreach($users as $user)
            @if($user->funcionario == true)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $user->foto) }}" class="card-img-top" alt="foto_do_usuario">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->ocupacao }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection