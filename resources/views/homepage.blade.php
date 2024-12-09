@extends('layouts.base')

@section('title', $empresa->razao_social . ' - Página Inicial')  <!-- Usando o nome da empresa no título -->

@section('content')
    <section id="sobre" class="py-5">
        <div class="container text-center">
            <h1>Bem-vindo à {{ $empresa->razao_social }}!</h1>  <!-- Usando o nome da empresa na mensagem -->
            <p>A Apollo Solar é especializada em soluções de energia solar para residências e empresas. Nosso compromisso é ajudar nossos clientes a reduzir os custos com energia elétrica enquanto contribuem para um futuro mais sustentável. Com uma equipe de profissionais qualificados e tecnologia de ponta, oferecemos consultoria personalizada e serviços de instalação de sistemas fotovoltaicos.</p>
            <a href="#servicos" class="btn btn-primary">Saiba mais sobre nossos serviços</a>
        </div>
    </section>

    <section id="servicos" class="bg-light py-5">
        <div class="container text-center">
            <h2 class="font-weight-bold">Nossos Serviços</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <div class="card-body">
                            <h5 class="card-title">Consultoria Especializada</h5>
                            <p class="card-text">Oferecemos uma análise detalhada do seu consumo energético para apresentar a melhor solução de energia solar, ajustada às suas necessidades específicas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <div class="card-body">
                            <h5 class="card-title">Instalação de Sistemas Fotovoltaicos</h5>
                            <p class="card-text">Realizamos a instalação de sistemas fotovoltaicos de alta performance, com garantia de qualidade e eficiência para maximizar a economia de energia.</p>
                        </div>
                    </div>
                    <a href="{{ route('servico.index') }}" class="btn btn-link">Ver Mais</a>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <div class="card-body">
                            <h5 class="card-title">Manutenção e Limpeza de Painéis Solares</h5>
                            <p class="card-text">Garantimos o funcionamento eficiente dos seus painéis solares com serviços de manutenção preventiva e limpeza, prolongando a vida útil dos equipamentos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="depoimentos" class="py-5">
        <h3>Deixe seu depoimento!</h3>
        @auth <!-- Se alguém estiver logado, o formulário de depoimento aparece -->
            <!-- Formulário para Criar um Depoimento -->
            <form action="{{ route('depoimento.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="texto" id="texto" class="form-control" placeholder="Digite seu depoimento" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        @else
            <p>Faça <a href="#" data-toggle="modal" data-target="#loginModal">login</a> para deixar seu depoimento.</p>
        @endauth

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
    </section>

    <section id="contato" class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2>Entre em contato</h2>
            <p class="lead">Tem dúvidas sobre como começar a economizar com energia solar? Fale conosco e agende uma consultoria personalizada!</p>
            <a href="{{ route('empresa.contato') }}" class="btn btn-light btn-lg">Fale conosco</a>
        </div>
    </section>
@endsection 