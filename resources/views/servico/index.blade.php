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
                        <img src="https://placehold.jp/3d4070/ffffff/150x150.png" class="card-img-top" alt="Consultoria Especializada">
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
                        <img src="https://placehold.jp/3d4070/ffffff/150x150.png" class="card-img-top" alt="Instalação de Sistemas Fotovoltaicos">
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
                        <img src="https://placehold.jp/3d4070/ffffff/150x150.png" class="card-img-top" alt="Manutenção e Limpeza">
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

    <hr>

    <h3>O que nossos clientes dizem</h3>
        @if($depoimentos->count() > 0)
            @foreach($depoimentos as $depoimento)
                <div class="card my-3">
                    <div class="card-body">
                        <p>{{ $depoimento->texto }}</p>
                        <img src="{{ $depoimento->user->foto }}" alt="foto_do_usuario" class="img-thumbnail me-3" style="width: 64px; height: 64px; object-fit: cover;>
                        <strong>{{ $depoimento->user->name }}</strong>
                        <span class="text-muted"> em {{ $depoimento->created_at->format('d/m/Y') }}</span>

                        @auth <!-- Se alguém estiver logado, mostra os botões de gerenciamento -->
                            <!-- Botão de Editar -->
                            <button class="btn btn-primary editar-depoimento" data-id="{{ $depoimento->id }}" data-texto="{{ $depoimento->texto }}" data-toggle="modal" data-target="#editarDepoimentoModal">Editar</button>

                            <!-- Botão de Excluir -->
                            <form action="{{ route('depoimento.destroy', $depoimento->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        @endauth
                    </div>
                </div>
                
                <!-- Modal de Edição de Depoimento -->
                <div class="modal fade" id="editarDepoimentoModal" tabindex="-1" aria-labelledby="editarDepoimentoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarDepoimentoModalLabel">Editar Depoimento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- Formulário de Edição do Depoimento -->
                            <form id="editar-depoimento-form" action="{{ route('depoimento.update', $depoimento->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="texto">Depoimento:</label>
                                        <textarea name="texto" id="texto" class="form-control" placeholder="Digite seu depoimento" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> <!-- ajeitar -->
                                    <button type="submit" class="btn btn-primary" onclick="document.getElementById('editar-depoimento-form').submit()">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhum depoimento disponível.</p>
        @endif
    </div>

    <section id="contato" class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2>Entre em contato</h2>
            <p>Se você tem dúvidas sobre os nossos serviços ou quer saber mais sobre como podemos ajudar a reduzir seus custos com energia, entre em contato conosco!</p>
            <a href="{{ route('empresa.contato') }}" class="btn btn-light">Fale Conosco</a>
        </div>
    </section>
@endsection