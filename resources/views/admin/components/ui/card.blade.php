@props([
    'hover' => false,
    'padding' => 'p-6',
])

@php
    $baseClasses = 'bg-white dark:bg-slate-800/50 rounded-2xl border border-slate-200/50 dark:border-slate-700/50 shadow-sm';
    $hoverClasses = $hover ? 'hover:shadow-md transition-all duration-300 hover:-translate-y-0.5' : '';
    $classes = $baseClasses . ' ' . $hoverClasses . ' ' . $padding;
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>

