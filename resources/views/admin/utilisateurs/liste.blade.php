@extends('admin.gabarit_admin')
@section('contenu_admin')
<h4 class="fw-bold mb-4">👥 Clients inscrits</h4>

<div class="card carte-stat">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Nom</th><th>Email</th><th>Rôle</th><th>Inscrit le</th><th>Commandes</th></tr>
            </thead>
            <tbody>
            @foreach($utilisateurs as $utilisateur)
            <tr>
                <td class="text-muted">{{ $utilisateur->id }}</td>
                <td>{{ $utilisateur->name }}</td>
                <td>{{ $utilisateur->email }}</td>
                <td>
                    <span class="badge {{ $utilisateur->role == 'admin' ? 'bg-dark' : 'bg-secondary' }}">
                        {{ $utilisateur->role }}
                    </span>
                </td>
                <td>{{ $utilisateur->created_at->format('d/m/Y') }}</td>
                <td>{{ $utilisateur->commandes_count }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $utilisateurs->links() }}</div>
@endsection