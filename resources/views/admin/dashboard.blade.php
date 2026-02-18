@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Dashboard</h1>
        <p class="mt-2 text-slate-600 dark:text-slate-400">
            Welcome back! Here's what's happening with your application today.
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-admin.ui.stat-card
            title="Total Users"
            value="1,234"
            gradient="from-blue-500 to-blue-600"
            shadow="shadow-blue-500/25"
        >
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </x-admin.ui.stat-card>

        <x-admin.ui.stat-card
            title="Revenue"
            value="$12,345"
            gradient="from-emerald-500 to-emerald-600"
            shadow="shadow-emerald-500/25"
        >
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-admin.ui.stat-card>

        <x-admin.ui.stat-card
            title="Orders"
            value="567"
            gradient="from-purple-500 to-purple-600"
            shadow="shadow-purple-500/25"
        >
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
        </x-admin.ui.stat-card>

        <x-admin.ui.stat-card
            title="Growth"
            value="+23%"
            gradient="from-amber-500 to-amber-600"
            shadow="shadow-amber-500/25"
        >
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
        </x-admin.ui.stat-card>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activity Card -->
        <x-admin.ui.card hover>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Recent Activity</h2>
                <x-admin.ui.button variant="ghost" size="sm">View All</x-admin.ui.button>
            </div>
            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <div class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-900 dark:text-slate-100">New user registered</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">2 minutes ago</p>
                    </div>
                    <x-admin.ui.badge variant="success" size="sm">New</x-admin.ui.badge>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-2 rounded-lg bg-emerald-100 dark:bg-emerald-900/30">
                        <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-900 dark:text-slate-100">Order completed</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">15 minutes ago</p>
                    </div>
                    <x-admin.ui.badge variant="info" size="sm">Order</x-admin.ui.badge>
                </div>
            </div>
        </x-admin.ui.card>

        <!-- Quick Actions Card -->
        <x-admin.ui.card hover>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Quick Actions</h2>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <x-admin.ui.button variant="primary" class="w-full">
                    Create User
                </x-admin.ui.button>
                <x-admin.ui.button variant="secondary" class="w-full">
                    View Reports
                </x-admin.ui.button>
                <x-admin.ui.button variant="ghost" class="w-full">
                    Settings
                </x-admin.ui.button>
                <x-admin.ui.button variant="ghost" class="w-full">
                    Help Center
                </x-admin.ui.button>
            </div>
        </x-admin.ui.card>
    </div>

    <!-- Alerts Example -->
    <div class="mt-6 space-y-4">
        <x-admin.ui.alert type="success" dismissible>
            Your changes have been saved successfully!
        </x-admin.ui.alert>
        <x-admin.ui.alert type="info">
            New features are available. Check them out!
        </x-admin.ui.alert>
    </div>
@endsection

