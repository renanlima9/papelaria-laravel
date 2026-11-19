<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function mostrar(Request $request)
    {
        $tipo = $request->query('tipo', '');
        $tipos = Artigo::where('quantidade', '>', 0)->distinct()->orderBy('tipo')->pluck('tipo');

        $consulta = Artigo::where('quantidade', '>', 0);

        if ($tipo !== '') {
            $consulta->where('tipo', $tipo);
        }

        $artigos = $consulta->orderBy('nome')->get();

        return view('loja.index', compact('artigos', 'tipos', 'tipo'));
    }
}
