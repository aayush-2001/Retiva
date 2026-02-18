@props([
    'variant' => 'default',
    'size' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center font-medium rounded-lg';
    
    $variantClasses = [
        'default' => 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300',
        'success' => 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200',
        'warning' => 'bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200',
        'danger' => 'bg-rose-100 dark:bg-rose-900/30 text-rose-800 dark:text-rose-200',
        'info' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200',
    ];
    
    $sizeClasses = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-1 text-sm',
    ];
    
    $classes = $baseClasses . ' ' . $variantClasses[$variant] . ' ' . $sizeClasses[$size];
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>

