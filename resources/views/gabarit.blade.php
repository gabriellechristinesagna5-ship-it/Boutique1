<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('accueil') }}">🛍️ Ma Boutique</a>
        <div class="ms-auto d-flex gap-3">
            @auth
                @if(auth()->user()->isAdmin())
                    <a class="text-white" href="{{ route('admin.dashboard') }}">📊 Voir dashboard</a>
                @else
                    <a class="text-white" href="{{ route('panier') }}">🛒 Panier</a>
                @endif
                <a class="text-white" href="{{ route('mes.commandes') }}">Mes commandes</a>
            @else
                <a class="text-white" href="{{ route('panier') }}">🛒 Panier</a>
                <a class="text-white" href="{{ route('login') }}">Connexion</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('succes'))
        <div class="alert alert-success">{{ session('succes') }}</div>
    @endif
    @yield('contenu')
</div>
</body>
</html>