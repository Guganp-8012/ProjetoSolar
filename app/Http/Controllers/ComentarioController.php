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

        Comentario::create([
            'conteudo' => $request->conteudo,
            'user_id' => auth()->user()->id,
            'postagem_id' => $postagem->id,
        ]);

        return redirect()->route('blog.detalhes', $postagem->id)->with('success', 'Comentário postado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postagem = Postagem::with('comentario')->find($id);
    
        return view('blog.postagem-detalhes', compact('postagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comentario = Comentario::find($id);

        return view('comentario.edit', ['comentario' => $comentario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $comentario = Comentario::find($id);
        $comentario->update($request->all());

        return redirect()->route('blog.detalhes', $comentario->postagem_id)->with('success', 'Comentário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        if (!$comentario) {
            return redirect()->route('blog.index')->withErrors(['error' => 'Comentário não encontrado para exclusão.']);
        }

        $comentario->delete();

        return redirect()->route('blog.detalhes', $comentario->postagem_id)->with('success', 'Comentário excluído com sucesso!');
    }
}