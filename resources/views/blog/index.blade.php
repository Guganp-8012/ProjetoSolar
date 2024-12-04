@extends('layouts.base')

@section('title', 'Blog')

@section('content')
    <section class="intro py-5">
        <div class="container text-center">
            <h1>Blog - Fique por dentro das novidades sobre Energia Solar</h1>
            <p>Explore nossos artigos e aprenda mais sobre como a energia solar pode transformar sua casa ou empresa, além de contribuir para um futuro mais sustentável.</p>
        </div>
    </section>

    @auth
        @if(auth()->user()->funcionario == true)
            <div class="container text-center mb-4">
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Criar Postagem</a>
                <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Ver Categorias</a>
            </div>
        @endif
    @endauth

    <section class="blog-list py-5">
        <div class="container">
            <h2>Últimas Postagens</h2>
            <div class="d-flex flex-wrap" style="gap: 45px;">
                @foreach($postagens as $postagem)
                    <a href="{{ route('blog.detalhes', $postagem->id) }}" style="text-decoration: none;">
                        <div class="card" style="width: 18rem;">
                            <!-- Imagem do post -->
                            <img src="https://demo.creativemox.com/sere/wp-content/uploads/sites/14/2023/09/alternative-energy-ecological-concept-e1696032458127.jpg" alt="imagem_do_post" style="height: 190px; width: 100%; align-self: center;">

                            <div class="card-body">
                                <h5 class="card-title">{{ $postagem->titulo }}</h5>
                            </a>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($postagem->conteudo, 176, '[...]') }}</p>
                            </div>

                            <div class="card-footer text-muted">
                                <span>{{ date('d/m/Y', strtotime($postagem->data)) }}</span>
                                <span>•</span>
                                <a href="{{ route('categoria.show', $postagem->categoria->id) }}" style="text-decoration: none;">
                                    {{ $postagem->categoria->nome }}
                                </a>

                                @auth
                                    @if(auth()->user()->funcionario == true)
                                        <hr>

                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('blog.edit', $postagem->id) }}" class="btn btn-secondary">Editar Postagem</a>

                                            <form action="{{ route('blog.destroy', $postagem->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="info py-5 bg-light">
        <div class="container text-center">
            <h2>Mais sobre energia solar</h2>
            <p>Você sabia que os sistemas de energia solar são uma das formas mais eficientes e sustentáveis de gerar eletricidade? Ao instalar painéis solares, você reduz os custos com energia elétrica e ajuda a preservar o meio ambiente. Se você está interessado em aprender mais, fique ligado no nosso blog para dicas, novidades e informações relevantes sobre o setor de energia solar.</p>
        </div>
    </section>
@endsection
