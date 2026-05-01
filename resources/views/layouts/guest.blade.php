<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SenMarket — Authentification</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;700;800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="background: linear-gradient(135deg, #ffffff, #fff8ef);">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8">
            <div class="mb-6 text-center">
                <x-senmarket-brand :href="route('landing')" :showSlogan="true" :centered="true" />
                <p class="mt-4 text-sm text-slate-500 max-w-md">
                    Connectez-vous à SenMarket ou créez votre compte pour accéder à la boutique.
                </p>
            </div>

            <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-xl overflow-hidden sm:rounded-2xl border border-slate-100">
                {{ $slot }}
            </div>

            <p class="mt-6 text-xs text-slate-500 text-center">
                SenMarket — Votre marché, toujours plus proche
            </p>
        </div>
    </body>
</html>
