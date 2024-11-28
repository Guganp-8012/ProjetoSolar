@extends('layouts.base')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    
    @auth
        @if(auth()->user()->funcionario == true)
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Criar Postagem</a>
            <a href="{{ route('categoria.index') }}" class="btn btn-primary">Ver Categorias</a>
        @endif
    @endauth

    <div class="d-flex flex-wrap" style="gap: 45px;">
        @foreach($postagens as $postagem)
            <a href="{{ route('blog.detalhes', $postagem->id) }}" style="text-decoration: none;">
                <div class="card" style="width: 18rem;">
                    @if($postagem->foto)
                        <img src="{{ asset('storage/' . $postagem->foto) }}" alt="imagem do post" style="height: 190px; width: 100%; align-self: center;">
                    @else
                        Sem foto
                    @endif

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
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('blog.edit', $postagem->id)  }}" class="btn btn-secondary">Editar Postagem</a>

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
        @endforeach
    </div>
@endsection