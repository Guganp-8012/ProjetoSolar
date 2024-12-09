<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Comentario;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postagens = Postagem::with('user', 'categoria')->get();

        return view('blog.index', ['postagens' => $postagens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $users = User::all();

        return view('blog.postagem-create', compact('categorias', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'conteudo' => 'required|string',
            'data' => 'required|date',
        ]);

        $foto_caminho = $request->file('foto')->store('fotos_postagem', 'public');

        $postagem = Postagem::create([
            'user_id' => $request->user_id,
            'categoria_id' => $request->categoria_id,
            'titulo' => $request->titulo,
            'foto' => $foto_caminho,
            'conteudo' => $request->conteudo,
            'data' => $request->data,
        ]);

        return redirect()->route('blog.detalhes', ['id' => $postagem->id])->with('success', 'Postagem cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postagem = Postagem::with('user', 'categoria', 'comentarios.user')->find($id);
        $postsRecentes = Postagem::with('user')->get();

        return view('blog.postagem-detalhes', compact('postagem', 'postsRecentes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $postagem = Postagem::find($id);
        $categorias = Categoria::all();
        $users = User::all();

        return view('blog.postagem-edit', compact('postagem', 'categorias', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $postagem = Postagem::find($id);

        $request->validate([
            'user_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'conteudo' => 'required|string',
            'data' => 'required|date',
        ]);

        $foto_caminho = $request->file('foto')->store('fotos_postagem', 'public');

        $postagem->update([
            'user_id' => $request->user_id,
            'categoria_id' => $request->categoria_id,
            'titulo' => $request->titulo,
            'foto' => $foto_caminho,
            'conteudo' => $request->conteudo,
            'data' => $request->data,
        ]);

        return redirect()->route('blog.index')->with('success', 'Postagem atualizada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $postagem = Postagem::find($id);
        if (!$postagem) {
            return redirect()->route('blog.index')->withErrors(['error' => 'Postagem não encontrada.']);
        }
        
        $postagem->delete();
        
        return redirect()->route('blog.index')->with('success', 'Postagem excluída com sucesso!');
    }
}