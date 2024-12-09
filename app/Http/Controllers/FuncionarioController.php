<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = User::all();
        
        return view('empresa.sobre', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'telefone' => 'nullable|string|max:15',
            'ocupacao' => 'nullable|string|max:255',
        ]);

        $foto_caminho = $request->file('foto')->store('fotos_funcionario', 'public');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $foto_caminho,
            'telefone' => $request->telefone,
            'funcionario' => true,
            'ocupacao' => $request->ocupacao,
        ]);

        return redirect()->route('empresa.sobre')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $funcionario = User::find($id);
        
        return view('funcionario.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $funcionario = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'telefone' => 'nullable|string|max:16',
            'ocupacao' => 'nullable|string|max:255',
        ]);

        $foto_caminho = $request->file('foto')->store('fotos_funcionario', 'public');

        $funcionario->update([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $foto_caminho,
            'telefone' => $request->telefone,
            'ocupacao' => $request->ocupacao,
        ]);
        
        return redirect()->route('empresa.sobre')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $funcionario = User::find($id);

        if ($funcionario) {
            return redirect()->route('empresa.sobre')->withErrors(['error' => 'Erro ao excluir o funcionário. Tente novamente.']);
        }

        $funcionario->delete();
        return redirect()->route('empresa.sobre')->with('success', 'Funcionário excluído com sucesso!');
    }
}