<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin — Ma Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .sidebar {
            min-height: 100vh;
            background: #1a1a2e;
            padding-top: 20px;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 6px;
            margin: 2px 10px;
        }
        .sidebar a:hover, .sidebar a.actif {
            background: #16213e;
            color: #fff;
        }
        .sidebar .titre-menu {
            color: #6c757d;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 20px 4px;
        }
        .carte-stat {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.07);
        }
    </style>
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar" style="width:240px; min-width:240px;">
        <div class="text-white fw-bold fs-5 px-4 pb-3 border-bottom border-secondary">
            🛍️ Admin Boutique
        </div>

        <div class="titre-menu">Tableau de bord</div>
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'actif' : '' }}">
            📊 Vue d'ensemble
        </a>

        <div class="titre-menu">Catalogue</div>
        <a href="{{ route('admin.produits.index') }}"
           class="{{ request()->routeIs('admin.produits.*') ? 'actif' : '' }}">
            📦 Produits
        </a>

        <div class="titre-menu">Ventes</div>
        <a href="{{ route('admin.commandes.index') }}"
           class="{{ request()->routeIs('admin.commandes.*') ? 'actif' : '' }}">
            🛒 Commandes
        </a>

        <div class="titre-menu">Utilisateurs</div>
        <a href="{{ route('admin.utilisateurs.index') }}"
           class="{{ request()->routeIs('admin.utilisateurs.*') ? 'actif' : '' }}">
            👥 Clients
        </a>

        <div class="border-top border-secondary mt-4 pt-3">
            <a href="{{ route('accueil') }}">🌐 Voir la boutique</a>
            <form action="/logout" method="POST" class="px-3 mt-2">
                @csrf
                <button class="btn btn-outline-danger btn-sm w-100">Déconnexion</button>
            </form>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="flex-grow-1 p-4">
        @if(session('succes'))
            <div class="alert alert-success alert-dismissible fade show">
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