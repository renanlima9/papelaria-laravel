<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Papelaria Central')</title>
    <link rel="stylesheet" href="{{ asset('css/papelaria.css') }}">
</head>
<body>
    @include('partials.topo')
    <main class="pagina">
        @if (session('sucesso'))
            <div class="mensagem sucesso">{{ session('sucesso') }}</div>
        @endif
        @if ($errors->any())
            <div class="mensagem erro">
                @foreach ($errors->all() as $erro)
                    <p>{{ $erro }}</p>
                @endforeach
            </div>
        @endif
        @yield('conteudo')
    </main>
    <footer>Projeto de Desenvolvimento Web II · Papelaria Central</footer>
</body>
</html>
