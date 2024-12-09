<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('portfolio.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:500',
            'foto' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'cidade' => 'required|string|max:255',
            'potencia' => 'required|numeric',
            'tipo' => 'required|string',
            'economia' => 'required|numeric',
        ]);

        $foto_caminho = $request->file('foto')->store('fotos_portfolio', 'public');

        Portfolio::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'foto' => $foto_caminho,
            'cidade' => $request->cidade,
            'potencia' => $request->potencia,
            'tipo' => $request->tipo,
            'economia' => $request->economia,
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Projeto cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);

        return view('portfolio.edit', ['portfolio' => $portfolio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:500',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'cidade' => 'required|string|max:255',
            'potencia' => 'required|numeric',
            'tipo' => 'required|string',
            'economia' => 'required|numeric',
        ]);

        $foto_caminho = $request->file('foto')->store('fotos_portfolio', 'public');
        
        $portfolio->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'foto' => $foto_caminho,
            'cidade' => $request->cidade,
            'potencia' => $request->potencia,
            'tipo' => $request->tipo,
            'economia' => $request->economia,
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        if (!$portfolio) {
            return redirect()->route('portfolio.index')->withErrors(['error' => 'Projeto não encontrado.']);
        }
        
        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Projeto excluído com sucesso!');
    }
}