@props([
    'title' => null,
    'value' => null,
    'gradient' => 'from-blue-500 to-blue-600',
    'shadow' => 'shadow-blue-500/25',
])

<div class="group relative bg-white dark:bg-slate-800/50 rounded-2xl p-6 border border-slate-200/50 dark:border-slate-700/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            @if($title)
                <p class="text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">
                    {{ $title }}
                </p>
            @endif
            @if($value)
                <p class="text-2xl font-bold text-slate-900 dark:text-slate-100">
                    {{ $value }}
                </p>
            @endif
        </div>
        
        @if($slot->isNotEmpty())
            <div class="p-3 rounded-xl bg-gradient-to-br {{ $gradient }} shadow-lg {{ $shadow }}">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>

