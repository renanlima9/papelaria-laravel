@extends('layouts.base')
@section('titulo', 'Controle de estoque | Papelaria Central')
@section('conteudo')
<div class="titulo-secao">
    <div><span class="sobretitulo escuro">ADMINISTRAÇÃO</span><h1>Controle de estoque</h1></div>
    <a class="link" href="{{ route('loja') }}">Ver catálogo</a>
</div>

<section class="painel">
    <h2>Novo artigo</h2>
    <form method="POST" action="{{ route('artigos.store') }}">
        @csrf
        @include('artigos.formulario')
        <button type="submit" class="botao">Salvar artigo</button>
    </form>
</section>

<section class="painel">
    <h2>Artigos cadastrados</h2>
    <div class="rolagem">
        <table>
            <thead><tr><th>Nome</th><th>Categoria</th><th>Valor</th><th>Quantidade</th><th>Ações</th></tr></thead>
            <tbody>
                @forelse ($artigos as $artigo)
                    <tr>
                        <td><strong>{{ $artigo->nome }}</strong></td>
                        <td>{{ $artigo->tipo }}</td>
                        <td>R$ {{ number_format($artigo->valor, 2, ',', '.') }}</td>
                        <td>{{ $artigo->quantidade }}</td>
                        <td class="acoes">
                            <a class="botao pequeno" href="{{ route('artigos.edit', $artigo) }}">Editar</a>
                            <form method="POST" action="{{ route('artigos.destroy', $artigo) }}" onsubmit="return confirm('Excluir este artigo?')">
                                @csrf
                                @method('DELETE')
                                <button class="botao perigoso pequeno" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Nenhum artigo cadastrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
