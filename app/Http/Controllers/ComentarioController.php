<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Postagem;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Postagem $postagem)
    {
        $request->validate([
            'conteudo' => 'required|string',
        ]);

        $comentario = new Comentario();
        $comentario->conteudo = $request->conteudo;
        $comentario->user_id = auth()->user()->id;
        $comentario->postagem_id = $postagem->id;
        $comentario->save();

        return redirect()->route('comentario.store', ['postagem' => $postagem->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postagem = Postagem::find($id);
        $comentarios = Comentario::where('postagem_id', $id)->get();
    
        return view('blog.postagem-detalhes', compact('postagem', 'comentarios', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
