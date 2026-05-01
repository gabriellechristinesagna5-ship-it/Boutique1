@props([
    'href' => route('landing'),
    'showSlogan' => true,
    'centered' => false,
    'small' => false,
    'theme' => 'light',
])

@php
    $logoSize = $small ? '48px' : '64px';
    $titleSize = $small ? '1.35rem' : '1.75rem';
    $subtitleSize = $small ? '0.82rem' : '0.95rem';
    $isDark = $theme === 'dark';
    $senColor = $isDark ? '#ffffff' : '#0b2240';
    $marketColor = '#bea173';
    $subtitleColor = $isDark ? 'rgba(255,255,255,.78)' : '#5d6b7a';
@endphp

<div style="{{ $centered ? 'text-align:center;' : '' }}">
    <a href="{{ $href }}" style="display:inline-flex; align-items:center; gap:14px; text-decoration:none; color:{{ $senColor }};">
        <img src="{{ asset('images/senmarket-logo.png') }}" alt="Logo SenMarket" style="width:{{ $logoSize }}; height:{{ $logoSize }}; object-fit:contain; border-radius:14px; background:{{ $isDark ? 'rgba(255,255,255,.06)' : 'transparent' }};">
        <span>
            <span style="display:block; font-size:{{ $titleSize }}; font-weight:800; line-height:1.1; letter-spacing:-0.02em;">
                <span style="color:{{ $senColor }};">Sen</span><span style="color:{{ $marketColor }};">Market</span>
            </span>
            @if($showSlogan)
                <span style="display:block; margin-top:2px; color:{{ $subtitleColor }}; font-size:{{ $subtitleSize }}; font-weight:500;">
                    Votre marché, toujours plus proche
                </span>
            @endif
        </span>
    </a>
</div>
