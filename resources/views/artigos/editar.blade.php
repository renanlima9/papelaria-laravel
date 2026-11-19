@extends('layouts.base')
@section('titulo', 'Editar artigo | Papelaria Central')
@section('conteudo')
<div class="titulo-secao">
    <div><span class="sobretitulo escuro">ADMINISTRAÇÃO</span><h1>Editar artigo</h1></div>
    <a class="link" href="{{ route('artigos.index') }}">Voltar ao estoque</a>
</div>

<section class="painel">
    <form method="POST" action="{{ route('artigos.update', $artigo) }}">
        @csrf
        @method('PUT')
        @include('artigos.formulario')
        <button class="botao" type="submit">Salvar alterações</button>
    </form>
</section>
@endsection
