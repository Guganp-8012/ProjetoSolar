@extends('layouts.base')

@section('title', 'Homepage')

@section('content')
    <!-- Botão para acionar modal -->
    @guest <!-- Se ninguém estiver logado, mostre o botão de login -->
        <button onclick="abrirModal()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
            Login
        </button>
    @endguest

    @auth <!-- Se alguém estiver logado, mostre o botão de logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Sair</button>
        </form>
    @endauth

    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Formulário de login -->
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div>
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                        </div> 
                        <div>
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="document.getElementById('loginForm').submit()">Entrar</button>
                    <span>Não tem conta? Cadastre-se <a href="#" data-toggle="modal" data-target="#cadastroModal">aqui</a><span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Cadastro -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Formulário de cadastro -->
                    <form method="POST" action="{{ route('register') }}" id="cadastroForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome *</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome completo" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail *</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Senha *</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Senha *</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="foto">Foto (opcional)</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" placeholder="Digite seu telefone (opcional)" name="telefone">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <span>Campos obrigatórios são marcados com *</span>
                    <button type="submit" class="btn btn-primary" onclick="document.getElementById('cadastroForm').submit()">Salvar</button>
                </div>
            </div>
        </div>
    </div>
@endsection