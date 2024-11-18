@extends('layouts.base')

@section('title', 'Contatos')

@section('content')
    <h1>Contatos</h1>
    <p>Endereço: {{ $empresa->endereco }}</p>
    <p>Email: {{ $empresa->email }}</p>
    <p>Faça uma ligação: {{ $empresa->telefone }}</p>
    <p>Redes Sociais</p>
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