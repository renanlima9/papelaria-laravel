@extends('layouts.base')
@section('titulo', 'Catálogo | Papelaria Central')
@section('conteudo')
<section class="abertura">
    <span class="sobretitulo">VOLTA ÀS AULAS</span>
    <h1>Seu material, sua próxima ideia.</h1>
    <p>Escolha os itens para sua cesta e confira o total antes de finalizar sua seleção.</p>
    <a class="botao branco" href="{{ route('cesta') }}">Ver minha cesta</a>
</section>

<div class="titulo-secao">
    <div>
        <span class="sobretitulo escuro">NOSSA SELEÇÃO</span>
        <h2>Catálogo de produtos</h2>
    </div>
    <form method="GET" action="{{ route('loja') }}" class="filtro">
        <label for="tipo">Categoria</label>
        <select id="tipo" name="tipo" onchange="this.form.submit()">
            <option value="">Todas</option>
            @foreach ($tipos as $categoria)
                <option value="{{ $categoria }}" @selected($categoria === $tipo)>{{ $categoria }}</option>
            @endforeach
        </select>
        <noscript><button type="submit">Filtrar</button></noscript>
    </form>
</div>

<div class="vitrine">
    @forelse ($artigos as $artigo)
        <article class="produto">
            <div class="produto-ilustracao" aria-hidden="true">
                @if ($artigo->tipo === 'Cadernos') 📒
                @elseif ($artigo->tipo === 'Escrita') ✏️
                @elseif ($artigo->tipo === 'Acessórios') 📐
                @else 🗒️
                @endif
            </div>
            <div class="produto-conteudo">
                <span class="tipo">{{ $artigo->tipo }}</span>
                <h3>{{ $artigo->nome }}</h3>
                <p class="detalhes">{{ $artigo->detalhes ?: 'Item disponível para compra.' }}</p>
                <div class="produto-preco">
                    <strong>R$ {{ number_format($artigo->valor, 2, ',', '.') }}</strong>
                    <small>{{ $artigo->quantidade }} em estoque</small>
                </div>
                <form class="comprar" method="POST" action="{{ route('cesta.adicionar') }}">
                    @csrf
                    <input type="hidden" name="artigo_id" value="{{ $artigo->id }}">
                    <label for="unidades{{ $artigo->id }}">Qtd.</label>
                    <input id="unidades{{ $artigo->id }}" type="number" name="unidades" value="1" min="1" max="{{ $artigo->quantidade }}" required>
                    <button class="botao" type="submit">Adicionar</button>
                </form>
            </div>
        </article>
    @empty
        <p class="sem-itens">Nenhum item disponível nessa categoria.</p>
    @endforelse
</div>
@endsection
