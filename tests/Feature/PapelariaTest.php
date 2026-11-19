<?php

namespace Tests\Feature;

use App\Models\Artigo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PapelariaTest extends TestCase
{
    use RefreshDatabase;

    public function test_exibe_itens_no_catalogo(): void
    {
        Artigo::create([
            'nome' => 'Borracha branca', 'tipo' => 'Escrita',
            'detalhes' => 'Maciez', 'valor' => 3.50, 'quantidade' => 10,
        ]);

        $this->get('/')->assertOk()->assertSee('Borracha branca');
    }

    public function test_cadastra_e_adiciona_na_cesta(): void
    {
        $this->post(route('artigos.store'), [
            'nome' => 'Régua', 'tipo' => 'Acessórios',
            'detalhes' => '30 cm', 'valor' => 4.00, 'quantidade' => 6,
        ])->assertRedirect(route('artigos.index'));

        $artigo = Artigo::where('nome', 'Régua')->firstOrFail();

        $this->post(route('cesta.adicionar'), [
            'artigo_id' => $artigo->id, 'unidades' => 2,
        ])->assertRedirect(route('loja'));

        $this->get(route('cesta'))->assertOk()->assertSee('Régua')->assertSee('8,00');
    }

    public function test_nao_permite_adicionar_acima_do_estoque(): void
    {
        $artigo = Artigo::create([
            'nome' => 'Apontador', 'tipo' => 'Acessórios',
            'detalhes' => '', 'valor' => 5, 'quantidade' => 1,
        ]);

        $this->from('/')->post(route('cesta.adicionar'), [
            'artigo_id' => $artigo->id, 'unidades' => 2,
        ])->assertRedirect('/')->assertSessionHasErrors('unidades');
    }
}
