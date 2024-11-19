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
        //
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

        $foto_camimho = $request->file('foto')->store('fotos', 'public');

        $postagem = Postagem::create([
            'user_id' => $request->user_id,
            'categoria_id' => $request->categoria_id,
            'titulo' => $request->titulo,
            'foto' => $foto_camimho,
            'conteudo' => $request->conteudo,
            'data' => $request->data,
        ]);

        return redirect()->route('blog.detalhes', ['id' => $postagem->id]); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postagem = Postagem::with('user', 'categoria', 'comentarios.user')->find($id);

        return view('blog.postagem-detalhes', compact('postagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postagem $postagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postagem $postagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postagem $postagem)
    {
        //
    }
}