<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    public function index()
    {
        $artigos = Artigo::orderBy('nome')->get();

        return view('artigos.index', compact('artigos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate($this->regras());
        Artigo::create($dados);

        return redirect()->route('artigos.index')->with('sucesso', 'Artigo cadastrado.');
    }

    public function edit(Artigo $artigo)
    {
        return view('artigos.editar', compact('artigo'));
    }

    public function update(Request $request, Artigo $artigo)
    {
        $dados = $request->validate($this->regras());
        $artigo->update($dados);

        return redirect()->route('artigos.index')->with('sucesso', 'Artigo atualizado.');
    }

    public function destroy(Request $request, Artigo $artigo)
    {
        $cesta = $request->session()->get('cesta', []);
        unset($cesta[$artigo->id]);
        $request->session()->put('cesta', $cesta);
        $artigo->delete();

        return redirect()->route('artigos.index')->with('sucesso', 'Artigo excluído.');
    }

    private function regras(): array
    {
        return [
            'nome' => 'required|string|max:120',
            'tipo' => 'required|string|max:60',
            'detalhes' => 'nullable|string|max:400',
            'valor' => 'required|numeric|min:0.01|max:999999',
            'quantidade' => 'required|integer|min:0',
        ];
    }
}
