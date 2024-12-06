@extends('layouts.base')

@section('title', 'Página não encontrada')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        <h1 class="display-1 text-danger">404</h1>
        <h2 class="mb-4">Página não encontrada</h2>
        <p class="text-muted text-center" style="max-width: 500px;">
            A página que você está procurando pode ter sido removida, teve o nome alterado ou está temporariamente indisponível.
        </p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Voltar para a página inicial</a>
    </div>
@endsection