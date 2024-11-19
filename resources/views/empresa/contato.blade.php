@extends('layouts.base')

@section('title', 'Contatos')

@section('content')
    <h1>Contatos</h1>
    <h2>Solicite Atendimento</h2>
    <p>Entre em contato conosco. Temos uma equipe de suporte especializada para atender você.</p>
    <h5>Endereço:</h5> <span>{{ $empresa->endereco }}</span>
    <h5>Email:</h5> <span>{{ $empresa->email }}</span>
    <h5>Faça uma ligação:</h5> <span>{{ $empresa->telefone }}</span>
    <h5>Redes Sociais:</h5>
    <a href="#">Facebook</a>
    <a href="#">Instagram</a>
    <a href="#">Twitter</a>
    <a href="#">Linkedin</a>
    <h4>Tem alguma pergunta ou feedback?</h4>
    <p>Nos envie uma mensagem:</p>

    <!-- Formulário de ContateNos -->
    <div>
        <form action="{{ route('contate.store') }}" method="POST">
            @csrf
            <input type="hidden" name="empresa_id" value="{{ $empresa->id }}"> <!-- Passa o empresa_id para o formulário -->
            <div class="form-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome *" required>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail *" required>
                <textarea name="mensagem" id="mensagem" class="form-control" placeholder="Mensagem" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar mensagem</button>
        </form>
    </div>
@endsection