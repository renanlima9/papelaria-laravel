<header class="cabecalho">
    <div class="cabecalho-interno">
        <a href="{{ route('loja') }}" class="marca"><span class="simbolo">✦</span> Papelaria Central</a>
        <nav class="navegacao">
            <a href="{{ route('loja') }}">Catálogo</a>
            <a href="{{ route('cesta') }}">Minha cesta <span class="contador">{{ array_sum(session('cesta', [])) }}</span></a>
            <a href="{{ route('artigos.index') }}">Estoque</a>
        </nav>
    </div>
</header>
