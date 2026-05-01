<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SenMarket — Boutique en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --sen-navy: #0b2240;
            --sen-gold: #bea173;
            --sen-bg: #fffaf5;
        }
        body {
            background: linear-gradient(180deg, #ffffff 0%, var(--sen-bg) 100%);
            color: #243447;
        }
        .sen-topbar {
            background: rgba(11, 34, 64, 0.98);
            box-shadow: 0 8px 24px rgba(11,34,64,.12);
        }
        .sen-topbar .nav-link,
        .sen-topbar .navbar-brand,
        .sen-topbar .btn-link {
            color: #fff !important;
            text-decoration: none;
        }
        .sen-topbar .nav-link:hover,
        .sen-topbar .btn-link:hover {
            color: #f3ddbc !important;
        }
        .sen-page-shell {
            padding-top: 32px;
            padding-bottom: 48px;
        }
        .sen-content-card {
            background: rgba(255,255,255,.92);
            border: 1px solid rgba(11,34,64,.06);
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(11,34,64,.08);
            padding: 28px;
        }
        .sen-footer {
            color: #677382;
        }
        .sen-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(190,161,115,.14);
            color: var(--sen-navy);
            font-weight: 700;
        }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg sen-topbar py-3">
    <div class="container align-items-center">
        <div class="me-3">
            <x-senmarket-brand :href="route('landing')" :showSlogan="false" :small="true" theme="dark" />
        </div>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#senNav" aria-controls="senNav" aria-expanded="false" aria-label="Navigation">
            <span class="fw-bold text-dark">☰</span>
        </button>

        <div class="collapse navbar-collapse" id="senNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('accueil') }}">Boutique</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('panier') }}">Panier</a></li>

                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard admin</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('mes.commandes') }}">Mes commandes</a></li>
                    @endif
                    <li class="nav-item ms-lg-2">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link p-0">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container sen-page-shell">
    @if(session('succes'))
        <div class="alert alert-success border-0 shadow-sm">{{ session('succes') }}</div>
    @endif

    <div class="sen-content-card">
        @yield('contenu')
    </div>

    <footer class="sen-footer mt-5">
        <div class="text-center">
            <div class="mb-3">
                <x-senmarket-brand :href="route('landing')" :showSlogan="true" :small="true" :centered="true" />
            </div>
            <div class="mb-2">
                <small class="text-muted">© 2024 SenMarket — Tous droits réservés</small>
            </div>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('accueil') }}" class="text-muted text-decoration-none small">Boutique</a>
                <a href="{{ route('panier') }}" class="text-muted text-decoration-none small">Panier</a>
                @auth
                    <a href="{{ route('mes.commandes') }}" class="text-muted text-decoration-none small">Mes commandes</a>
                @endauth
                <a href="{{ route('landing') }}" class="text-muted text-decoration-none small">Accueil</a>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
