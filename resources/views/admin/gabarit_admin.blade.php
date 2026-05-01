<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — SenMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --sen-navy: #0b2240;
            --sen-navy-soft: #102b50;
            --sen-gold: #bea173;
            --sen-bg: #f5f7fb;
        }
        body { background: var(--sen-bg); }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--sen-navy), var(--sen-navy-soft));
            padding-top: 20px;
        }
        .sidebar a {
            color: #d5dcea;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 10px;
            margin: 2px 10px;
        }
        .sidebar a:hover, .sidebar a.actif {
            background: rgba(255,255,255,.08);
            color: #fff;
        }
        .sidebar .titre-menu {
            color: rgba(255,255,255,.48);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 20px 4px;
        }
        .carte-stat {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 28px rgba(11,34,64,.08);
        }
        .admin-content {
            padding: 32px;
        }
        .admin-banner {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 26px rgba(11,34,64,.06);
            padding: 16px 20px;
            margin-bottom: 24px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar" style="width:260px; min-width:260px;">
        <div class="px-3 pb-3 border-bottom border-secondary border-opacity-25">
            <x-senmarket-brand :href="route('landing')" :showSlogan="true" :small="true" theme="dark" />
        </div>

        <div class="titre-menu">Tableau de bord</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'actif' : '' }}">
            📊 Vue d'ensemble
        </a>

        <div class="titre-menu">Catalogue</div>
        <a href="{{ route('admin.produits.index') }}" class="{{ request()->routeIs('admin.produits.*') ? 'actif' : '' }}">
            📦 Produits
        </a>

        <div class="titre-menu">Ventes</div>
        <a href="{{ route('admin.commandes.index') }}" class="{{ request()->routeIs('admin.commandes.*') ? 'actif' : '' }}">
            🛒 Commandes
        </a>

        <div class="titre-menu">Utilisateurs</div>
        <a href="{{ route('admin.utilisateurs.index') }}" class="{{ request()->routeIs('admin.utilisateurs.*') ? 'actif' : '' }}">
            👥 Clients
        </a>

        <div class="border-top border-secondary border-opacity-25 mt-4 pt-3">
            <a href="{{ route('accueil') }}">🌐 Voir la boutique</a>
            <form action="{{ route('logout') }}" method="POST" class="px-3 mt-2">
                @csrf
                <button class="btn btn-outline-light btn-sm w-100">Déconnexion</button>
            </form>
        </div>
    </div>

    <div class="flex-grow-1 admin-content">
        <div class="admin-banner d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <strong style="color:#0b2240;">SenMarket Admin</strong>
                <div class="text-muted small">Votre marché, toujours plus proche</div>
            </div>
        </div>

        @if(session('succes'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
                {{ session('succes') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('contenu_admin')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
