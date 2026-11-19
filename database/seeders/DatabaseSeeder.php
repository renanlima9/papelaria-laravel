<?php

namespace Database\Seeders;

use App\Models\Artigo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $artigos = [
            ['nome' => 'Caderno universitário', 'tipo' => 'Cadernos', 'detalhes' => 'Caderno espiral com 10 matérias e capa dura.', 'valor' => 24.90, 'quantidade' => 18],
            ['nome' => 'Caderno de desenho', 'tipo' => 'Cadernos', 'detalhes' => 'Folhas sem pauta para desenhos e esboços.', 'valor' => 16.50, 'quantidade' => 14],
            ['nome' => 'Caneta azul', 'tipo' => 'Escrita', 'detalhes' => 'Ponta média e escrita macia.', 'valor' => 2.50, 'quantidade' => 60],
            ['nome' => 'Kit marca-texto', 'tipo' => 'Escrita', 'detalhes' => 'Conjunto com quatro cores pastel.', 'valor' => 18.00, 'quantidade' => 20],
            ['nome' => 'Lápis grafite HB', 'tipo' => 'Escrita', 'detalhes' => 'Lápis para escrita e desenho.', 'valor' => 1.80, 'quantidade' => 80],
            ['nome' => 'Estojo simples', 'tipo' => 'Acessórios', 'detalhes' => 'Estojo com fechamento em zíper.', 'valor' => 14.90, 'quantidade' => 15],
            ['nome' => 'Régua 30 cm', 'tipo' => 'Acessórios', 'detalhes' => 'Régua transparente com escala em centímetros.', 'valor' => 4.00, 'quantidade' => 30],
            ['nome' => 'Bloco adesivo', 'tipo' => 'Papelaria', 'detalhes' => 'Bloco com 100 folhas para lembretes.', 'valor' => 7.90, 'quantidade' => 25],
        ];

        foreach ($artigos as $dados) {
            Artigo::firstOrCreate(['nome' => $dados['nome']], $dados);
        }
    }
}
