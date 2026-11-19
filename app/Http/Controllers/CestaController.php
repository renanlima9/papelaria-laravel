<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;

class CestaController extends Controller
{
    public function mostrar(Request $request)
    {
        $cesta = $request->session()->get('cesta', []);
        $artigos = Artigo::whereIn('id', array_keys($cesta))->get();
        $linhas = [];
        $total = 0;

        foreach ($artigos as $artigo) {
            $unidades = (int) ($cesta[$artigo->id] ?? 0);

            if ($unidades < 1) {
                continue;
            }

            $parcial = $unidades * (float) $artigo->valor;
            $linhas[] = compact('artigo', 'unidades', 'parcial');
            $total += $parcial;
        }

        return view('cesta.index', compact('linhas', 'total'));
    }

    public function adicionar(Request $request)
    {
        $dados = $request->validate([
            'artigo_id' => 'required|integer|exists:artigos,id',
            'unidades' => 'required|integer|min:1',
        ]);

        $artigo = Artigo::findOrFail($dados['artigo_id']);
        $cesta = $request->session()->get('cesta', []);
        $novoTotal = (int) ($cesta[$artigo->id] ?? 0) + (int) $dados['unidades'];

        if ($novoTotal > $artigo->quantidade) {
            return back()->withErrors(['unidades' => 'Não há unidades suficientes no estoque.']);
        }

        $cesta[$artigo->id] = $novoTotal;
        $request->session()->put('cesta', $cesta);

        return redirect()->route('loja')->with('sucesso', 'Item adicionado à cesta.');
    }

    public function alterar(Request $request, Artigo $artigo)
    {
        $dados = $request->validate(['unidades' => 'required|integer|min:1']);
        $cesta = $request->session()->get('cesta', []);

        if (!isset($cesta[$artigo->id])) {
            return redirect()->route('cesta');
        }

        if ((int) $dados['unidades'] > $artigo->quantidade) {
            return back()->withErrors(['unidades' => 'Não há unidades suficientes no estoque.']);
        }

        $cesta[$artigo->id] = (int) $dados['unidades'];
        $request->session()->put('cesta', $cesta);

        return redirect()->route('cesta')->with('sucesso', 'Quantidade atualizada.');
    }

    public function remover(Request $request, Artigo $artigo)
    {
        $cesta = $request->session()->get('cesta', []);
        unset($cesta[$artigo->id]);
        $request->session()->put('cesta', $cesta);

        return redirect()->route('cesta')->with('sucesso', 'Item removido da cesta.');
    }
}
