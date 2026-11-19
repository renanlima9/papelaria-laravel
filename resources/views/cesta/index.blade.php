@extends('layouts.base')
@section('titulo', 'Minha cesta | Papelaria Central')
@section('conteudo')
<div class="titulo-secao">
    <div>
        <span class="sobretitulo escuro">SUA SELEÇÃO</span>
        <h1>Minha cesta</h1>
    </div>
    <a class="link" href="{{ route('loja') }}">Voltar ao catálogo</a>
</div>

<div class="lista-cesta">
    @forelse ($linhas as $linha)
        <article class="linha-cesta">
            <div class="descricao-cesta">
                <span class="tipo">{{ $linha['artigo']->tipo }}</span>
                <h2>{{ $linha['artigo']->nome }}</h2>
                <p>Unidade: R$ {{ number_format($linha['artigo']->valor, 2, ',', '.') }}</p>
                <strong>Subtotal: R$ {{ number_format($linha['parcial'], 2, ',', '.') }}</strong>
                @if ($linha['unidades'] > $linha['artigo']->quantidade)
                    <p class="alerta">Estoque atual: {{ $linha['artigo']->quantidade }}. Ajuste a quantidade.</p>
                @endif
            </div>
            <div class="controles-cesta">
                @if ($linha['artigo']->quantidade > 0)
                    <form method="POST" action="{{ route('cesta.alterar', $linha['artigo']) }}">
                        @csrf
                        @method('PATCH')
                        <label for="item{{ $linha['artigo']->id }}">Unidades</label>
                        <input id="item{{ $linha['artigo']->id }}" type="number" name="unidades" min="1" max="{{ $linha['artigo']->quantidade }}" value="{{ $linha['unidades'] }}" required>
                        <button class="botao pequeno" type="submit">Atualizar</button>
                    </form>
                @endif
                <form method="POST" action="{{ route('cesta.remover', $linha['artigo']) }}">
                    @csrf
                    @method('DELETE')
                    <button class="botao perigoso pequeno" type="submit">Remover</button>
                </form>
            </div>
        </article>
    @empty
        <div class="vazio">
            <h2>Sua cesta está vazia</h2>
            <p>Escolha alguns produtos para começar.</p>
            <a class="botao" href="{{ route('loja') }}">Explorar catálogo</a>
        </div>
    @endforelse
</div>

@if (count($linhas))
    <div class="resumo">
        <span>Total da cesta</span>
        <strong>R$ {{ number_format($total, 2, ',', '.') }}</strong>
    </div>
@endif
@endsection
