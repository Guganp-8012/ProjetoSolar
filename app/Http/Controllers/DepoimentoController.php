<?php

namespace App\Http\Controllers;

use App\Models\Depoimento;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DepoimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = Empresa::firstOrCreate(
            ['id' => 1],
            ['razao_social' => 'Empresa Padrão', 'logo' => null, 'email' => 'padrao@email.com',  'telefone' => '+55 (XX) XXXXX-XXXX', 'endereco' => 'Endereço Padrão', 'descricao' => 'Descrição Padrão'] // Dados padrão para criar se empresa não existir
        );

        $depoimentos = Depoimento::with('user')->get();

        return view('homepage', compact('empresa', 'depoimentos'));
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
            'texto' => 'required|string',
        ]);

        Depoimento::create([
            'texto' => $request->texto,
            'user_id' => auth()->user()->id,
            'empresa_id' => 1,
        ]);

        return redirect()->route('home')->with('success', 'Depoimento postado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empresa = Empresa::find(1);

        return view('homepage', compact('depoimento', 'empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $depoimento = Depoimento::find($id);
        
        return view('depoimento.edit', ['depoimento' => $depoimento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $depoimento = Depoimento::find($id);

        $depoimento->update([
            'texto' => $request->texto,
        ]);

        return redirect()->route('home')->with('success', 'Depoimento atualizado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $depoimento = Depoimento::find($id);
        if (!$depoimento) {
            return redirect()->route('home')->withErrors(['error' => 'Depoimento não encontrado para exclusão.']);
        }

        $depoimento->delete();

        return redirect()->route('home')->with('success', 'Depoimento excluído com sucesso!');
    }

    public function servico()
    {
        $empresa = Empresa::find(1);
        $depoimentos = Depoimento::with('user')->get();

        return view('servico.index', compact('empresa', 'depoimentos'));
    }
}
