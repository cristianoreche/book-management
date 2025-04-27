<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Gerenciamento de livros</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

<header class="header">
    <div class="header__container">
        <div class="header__brand">
            <p class="header__title">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="8" height="18" x="3" y="3" rx="1"/>
                    <path d="M7 3v18"/>
                    <path d="M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z"/>
                </svg>
                Gerenciamento de livros
            </p>
        </div>

        <button class="header__menu-toggle" id="menu-toggle" aria-label="Abrir Menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </button>

        <nav class="header__nav" id="header-nav">
            <a href="{{ route('livros.index') }}" class="header__link">Livros</a>
            <a href="{{ route('assuntos.index') }}" class="header__link">Assuntos</a>
            <a href="{{ route('autores.index') }}" class="header__link">Autores</a>
            <a href="{{ route('relatorios.livros-por-autor') }}" class="header__link">Relatório</a>
        </nav>

    </div>
</header>

<main class="main">
    <div class="main__container">
        <x-alert type="success" :message="session('success')" />
        <x-alert type="error" :message="session('error')" />
        @yield('content')
    </div>
</main>

<footer class="footer">
    <div class="footer__container">
        <p class="footer__text">&copy; {{ date('Y') }} Gerenciamento de livros. Todos os direitos reservados.</p>
    </div>
</footer>

<script src="{{ asset('js/menu-toggle.js') }}"></script>
<script src="{{ asset('js/components/search.js') }}"></script>
<script src="{{ asset('js/components/modal.js') }}"></script>
<script src="{{ asset('js/mask-money.js') }}"></script>
</body>
</html>
