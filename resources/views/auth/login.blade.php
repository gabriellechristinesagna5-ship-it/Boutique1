@extends('gabarit')

@section('contenu')
<div class="text-center">
    <div class="mb-5">
        <x-senmarket-brand :href="route('landing')" :showSlogan="true" :small="false" :centered="true" />
    </div>
    
    <div class="mt-5">
        <a href="{{ route('register') }}" class="btn btn-primary" style="background: #0b2240; border-color: #0b2240;">S'inscrire</a>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary ms-3">Se connecter</a>
    </div>
</div>
@endsection
