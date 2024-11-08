@extends('layouts.base')

@section('title', 'Homepage')

@section('content')
    <ul class="nav justify-content-center" id="pills-tab" role="tablist" style="display: flex; width: 100%;">
        <li class="nav-item">
            <a class="nav-link" href="#" role="tab" aria-selected="false">Home</a>
        </li>
    
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explorar+</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Serviços</a>
                <a class="dropdown-item" href="#">Perguntas Frequentes</a>
                <a class="dropdown-item" href="#">Nosso time</a>
                <a class="dropdown-item" href="#">Simulador</a>
                <a class="dropdown-item" href="#">Página 404</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" role="tab" aria-selected="false">Sobre Nós</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#" role="tab" aria-selected="false">Blog</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#" role="tab" aria-selected="false">Contatos</a>
        </li>

        <li class="nav-item" style="align-self: flex-end">
            <!-- Botão para acionar modal -->
            <button onclick="abrirModal()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                Login
            </button>
        </li>
    </ul>
    

    <!-- Modal -->
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
                    <span>Não tem conta? Cadastre-se <a href="{{ route('register') }}">aqui</a><span>
                </div>
            </div>
        </div>
    </div>