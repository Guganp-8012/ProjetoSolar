@extends('layouts.base')

@section('title', 'Contato')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4 font-weight-bold">Entre em Contato</h1>
    <p class="text-center mb-5">
        Nossa equipe está pronta para ajudar você! Entre em contato pelo formulário abaixo ou utilize as informações disponíveis.
    </p>

    <div class="row">
        <!-- Formulário de Contato -->
        <div class="col-md-6">
            <h3 class="mb-3 font-weight-bold">Envie sua Mensagem</h3>
            <form action="{{ route('contate.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome *</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail *</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail" required>
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Mensagem *</label>
                    <textarea name="mensagem" id="mensagem" rows="5" class="form-control" placeholder="Escreva sua mensagem" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar Mensagem</button>
            </form>
        </div>

        <!-- Informações de Contato -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div>
                <h3 class="mb-3 font-weight-bold">Informações de Contato</h3>
                <p><strong>Endereço:</strong> {{ $empresa->endereco }}</p>
                <p><strong>Email:</strong> <a href="{{ $empresa->email }}">{{ $empresa->email }}</a></p>
                <p><strong>Telefone:</strong> <a href="{{ $empresa->telefone }}">{{ $empresa->telefone }}</a></p>
                <h4 class="mt-4 d-flex justify-content-center">Junte-se a nós nas redes sociais</h4>
                <p class="d-flex justify-content-center">
                    <a href="#facebook" class="text-decoration-none me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#instagram" class="text-decoration-none me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#twitter" class="text-decoration-none me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#linkedin" class="text-decoration-none me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="#whatsapp" class="text-decoration-none"><i class="fab fa-whatsapp"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f9f9f9;
    }
    .container {
        background: #fff;
        padding: 2rem;
        border-radius: 10px;
    }
</style>
@endsection