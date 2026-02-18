@props([
    'label' => null,
    'error' => null,
    'type' => 'text',
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'required' => false,
    'value' => null,
])

@php
    $inputId = $id ?? $name;
    $baseClasses = 'w-full px-4 py-2.5 rounded-xl border bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-200';
    $normalClasses = 'border-slate-200 dark:border-slate-700 focus:ring-blue-500';
    $errorClasses = 'border-rose-300 dark:border-rose-700 focus:ring-rose-500';
    $classes = $baseClasses . ' ' . ($error ? $errorClasses : $normalClasses);
@endphp

<div class="space-y-2">
    @if($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
            {{ $label }}
            @if($required)
                <span class="text-rose-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        @if($name) name="{{ $name }}" @endif
        @if($inputId) id="{{ $inputId }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($required) required @endif
        {{ $attributes->merge(['class' => $classes]) }}
    />

    @if($error)
        <p class="text-sm text-rose-600 dark:text-rose-400 flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $error }}
        </p>
    @endif
</div>

