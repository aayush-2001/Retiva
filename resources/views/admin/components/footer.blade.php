<footer class="mt-auto border-t border-slate-200/50 dark:border-slate-800/50 bg-white/50 dark:bg-slate-900/50 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="text-sm text-slate-600 dark:text-slate-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            </div>
            <div class="flex items-center gap-6 text-sm text-slate-600 dark:text-slate-400">
                <a href="#" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                    Privacy Policy
                </a>
                <a href="#" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                    Terms of Service
                </a>
                <a href="#" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                    Documentation
                </a>
            </div>
        </div>
    </div>
</footer>

