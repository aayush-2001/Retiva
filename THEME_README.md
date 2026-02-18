# ArchFlow Admin Theme - Complete Documentation

This document provides comprehensive instructions for recreating the ArchFlow admin theme in a new Laravel project. This theme uses **Tailwind CSS v4** with a modern, clean design system featuring dark mode support, gradient accents, and a component-based architecture.

## Table of Contents

1. [Overview](#overview)
2. [Installation & Setup](#installation--setup)
3. [Theme Configuration](#theme-configuration)
4. [Layout Structure](#layout-structure)
5. [Component System](#component-system)
6. [Design Tokens](#design-tokens)
7. [Color Palette](#color-palette)
8. [Typography](#typography)
9. [Spacing & Sizing](#spacing--sizing)
10. [Dark Mode](#dark-mode)
11. [Component Examples](#component-examples)

---

## Overview

The ArchFlow theme is a modern admin panel theme built with:
- **Tailwind CSS v4** (using `@tailwindcss/vite` plugin)
- **Vite** for asset bundling
- **Laravel Blade Components** for reusable UI elements
- **Dark mode** support (system preference with manual override capability)
- **Responsive design** with mobile-first approach
- **Glassmorphism effects** (backdrop blur, semi-transparent backgrounds)
- **Gradient accents** for primary actions and highlights

### Key Features

- Fixed top navbar with backdrop blur
- Collapsible sidebar (desktop: fixed, mobile: overlay)
- Gradient buttons and active states
- Stat cards with gradient icons
- Form inputs with focus states
- Alert/notification system
- Badge components
- Card components with hover effects

---

## Installation & Setup

### Step 1: Install Dependencies

```bash
npm install -D tailwindcss@^4.0.0 @tailwindcss/vite@^4.0.0 vite@^7.0.7 laravel-vite-plugin@^2.0.0
```

### Step 2: Configure Vite

Update `vite.config.js`:

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
```

### Step 3: Configure Tailwind CSS

Create/update `resources/css/app.css`:

```css
@import 'tailwindcss';

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
        'Segoe UI Symbol', 'Noto Color Emoji';
}
```

### Step 4: Add Font

Add to your main layout's `<head>`:

```html
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
```

### Step 5: Include Vite Assets

In your Blade layout:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

---

## Theme Configuration

### Base Body Classes

The main layout body should have:

```blade
<body class="bg-slate-50 dark:bg-slate-950 antialiased">
```

### Layout Container

```blade
<div class="min-h-screen flex flex-col">
    <!-- Content here -->
</div>
```

---

## Layout Structure

### Main Layout (`resources/views/admin/layouts/app.blade.php`)

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-slate-50 dark:bg-slate-950 antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        @include('admin.components.navbar')

        <div class="flex flex-1 pt-16">
            <!-- Sidebar -->
            @include('admin.components.sidebar')

            <!-- Main Content -->
            <main class="flex-1 lg:ml-64 transition-all duration-300 ease-in-out">
                <div class="p-6 lg:p-8 max-w-7xl mx-auto">
                    <!-- Flash Messages -->
                    @if (session('success'))
                        <div class="mb-6 bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800/50 text-emerald-800 dark:text-emerald-200 px-4 py-3 rounded-xl shadow-sm">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 bg-rose-50 dark:bg-rose-950/30 border border-rose-200 dark:border-rose-800/50 text-rose-800 dark:text-rose-200 px-4 py-3 rounded-xl shadow-sm">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Footer -->
        @include('admin.components.footer')
    </div>

    @stack('scripts')
</body>
</html>
```

### Navbar Component

**Location:** `resources/views/admin/components/navbar.blade.php`

**Key Features:**
- Fixed position (`fixed top-0 left-0 right-0`)
- Height: 16 (64px)
- Backdrop blur effect (`backdrop-blur-lg`)
- Semi-transparent background (`bg-white/80 dark:bg-slate-900/80`)
- On desktop, offset by sidebar width (`lg:left-64`)
- Mobile menu toggle button
- User dropdown menu

**Classes:**
```blade
<nav class="fixed top-0 left-0 right-0 z-50 h-16 bg-white/80 dark:bg-slate-900/80 backdrop-blur-lg border-b border-slate-200/50 dark:border-slate-800/50 lg:left-64 shadow-sm">
```

### Sidebar Component

**Location:** `resources/views/admin/components/sidebar.blade.php`

**Key Features:**
- Fixed position, 256px width (`w-64`)
- Hidden on mobile (`-translate-x-full`), visible on desktop (`lg:translate-x-0`)
- Backdrop blur effect
- Gradient logo/brand
- Active navigation items with gradient background
- Mobile overlay

**Classes:**
```blade
<aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 bg-white/95 dark:bg-slate-900/95 backdrop-blur-lg border-r border-slate-200/50 dark:border-slate-800/50 shadow-xl">
```

**Active Navigation Item:**
```blade
class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/25"
```

### Footer Component

**Location:** `resources/views/admin/components/footer.blade.php`

**Classes:**
```blade
<footer class="mt-auto border-t border-slate-200/50 dark:border-slate-800/50 bg-white/50 dark:bg-slate-900/50 backdrop-blur-sm">
```

---

## Component System

All components are located in `resources/views/admin/components/ui/` and should be registered as Blade components.

### 1. Button Component

**File:** `resources/views/admin/components/ui/button.blade.php`

**Variants:**
- `primary`: Gradient blue-to-indigo with shadow
- `secondary`: Slate background
- `danger`: Gradient rose with shadow
- `ghost`: Transparent with hover

**Sizes:**
- `sm`: `px-3 py-1.5 text-sm`
- `md`: `px-4 py-2 text-sm` (default)
- `lg`: `px-6 py-3 text-base`

**Usage:**
```blade
<x-admin.ui.button variant="primary" size="md">Click Me</x-admin.ui.button>
<x-admin.ui.button variant="danger" href="/delete">Delete</x-admin.ui.button>
```

**Primary Button Classes:**
```
bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30
```

### 2. Card Component

**File:** `resources/views/admin/components/ui/card.blade.php`

**Props:**
- `hover`: Boolean (adds hover effect)
- `padding`: String (default: `p-6`)

**Base Classes:**
```
bg-white dark:bg-slate-800/50 rounded-2xl border border-slate-200/50 dark:border-slate-700/50 shadow-sm
```

**Hover Effect:**
```
hover:shadow-md transition-all duration-300 hover:-translate-y-0.5
```

**Usage:**
```blade
<x-admin.ui.card>
    Content here
</x-admin.ui.card>

<x-admin.ui.card hover padding="p-8">
    With hover effect and custom padding
</x-admin.ui.card>
```

### 3. Input Component

**File:** `resources/views/admin/components/ui/input.blade.php`

**Props:**
- `label`: String
- `error`: String (error message)
- `type`: String (default: `text`)
- `name`: String
- `id`: String
- `placeholder`: String
- `required`: Boolean
- `value`: String

**Base Classes:**
```
w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200
```

**Error State:**
```
border-rose-300 dark:border-rose-700 focus:ring-rose-500
```

**Usage:**
```blade
<x-admin.ui.input
    name="email"
    label="Email Address"
    type="email"
    placeholder="Enter email"
    required
/>
```

### 4. Stat Card Component

**File:** `resources/views/admin/components/ui/stat-card.blade.php`

**Props:**
- `title`: String
- `value`: String/Number
- `gradient`: String (e.g., `from-blue-500 to-blue-600`)
- `shadow`: String (e.g., `shadow-blue-500/25`)

**Usage:**
```blade
<x-admin.ui.stat-card 
    title="Total Users" 
    value="1,234"
    gradient="from-blue-500 to-blue-600"
    shadow="shadow-blue-500/25"
>
    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <!-- Icon SVG -->
    </svg>
</x-admin.ui.stat-card>
```

**Card Structure:**
```
group relative bg-white dark:bg-slate-800/50 rounded-2xl p-6 border border-slate-200/50 dark:border-slate-700/50 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5
```

**Icon Container:**
```
p-3 rounded-xl bg-gradient-to-br {gradient} shadow-lg {shadow}
```

### 5. Badge Component

**File:** `resources/views/admin/components/ui/badge.blade.php`

**Variants:**
- `default`: Slate
- `success`: Emerald
- `warning`: Amber
- `danger`: Rose
- `info`: Blue

**Sizes:**
- `sm`: `px-2 py-0.5 text-xs`
- `md`: `px-2.5 py-1 text-sm` (default)

**Usage:**
```blade
<x-admin.ui.badge variant="success">Active</x-admin.ui.badge>
<x-admin.ui.badge variant="danger" size="sm">Inactive</x-admin.ui.badge>
```

### 6. Alert Component

**File:** `resources/views/admin/components/ui/alert.blade.php`

**Types:**
- `success`: Emerald colors
- `error`: Rose colors
- `warning`: Amber colors
- `info`: Blue colors

**Props:**
- `type`: String (default: `success`)
- `dismissible`: Boolean (default: `false`)

**Usage:**
```blade
<x-admin.ui.alert type="success" dismissible>
    Operation completed successfully!
</x-admin.ui.alert>
```

---

## Design Tokens

### Border Radius

- **Small:** `rounded-lg` (8px)
- **Medium:** `rounded-xl` (12px)
- **Large:** `rounded-2xl` (16px)

### Shadows

- **Small:** `shadow-sm`
- **Medium:** `shadow-md`
- **Large:** `shadow-lg`
- **Extra Large:** `shadow-xl`
- **Colored Shadows:** `shadow-blue-500/25`, `shadow-rose-500/25`, etc.

### Transitions

- **Default:** `transition-all duration-200`
- **Smooth:** `transition-all duration-300`
- **Easing:** `ease-in-out`

### Backdrop Blur

- **Light:** `backdrop-blur-sm`
- **Medium:** `backdrop-blur-lg`

---

## Color Palette

### Primary Colors (Gradients)

- **Primary Gradient:** `from-blue-500 to-indigo-600`
- **Success Gradient:** `from-emerald-500 to-emerald-600`
- **Warning Gradient:** `from-amber-500 to-amber-600`
- **Danger Gradient:** `from-rose-500 to-rose-600`
- **Purple Gradient:** `from-purple-500 to-purple-600`

### Background Colors

**Light Mode:**
- **Body:** `bg-slate-50`
- **Card:** `bg-white`
- **Navbar/Sidebar:** `bg-white/80` or `bg-white/95` (with backdrop blur)

**Dark Mode:**
- **Body:** `bg-slate-950`
- **Card:** `bg-slate-800/50`
- **Navbar/Sidebar:** `bg-slate-900/80` or `bg-slate-900/95` (with backdrop blur)

### Border Colors

**Light Mode:**
- `border-slate-200/50`
- `border-slate-300`

**Dark Mode:**
- `border-slate-700/50`
- `border-slate-800/50`

### Text Colors

**Light Mode:**
- **Primary:** `text-slate-900`
- **Secondary:** `text-slate-600`
- **Muted:** `text-slate-500` or `text-slate-400`

**Dark Mode:**
- **Primary:** `text-slate-100`
- **Secondary:** `text-slate-400`
- **Muted:** `text-slate-500`

### Status Colors

**Success:**
- Light: `bg-emerald-50`, `text-emerald-800`, `border-emerald-200`
- Dark: `bg-emerald-950/30`, `text-emerald-200`, `border-emerald-800/50`

**Error/Danger:**
- Light: `bg-rose-50`, `text-rose-800`, `border-rose-200`
- Dark: `bg-rose-950/30`, `text-rose-200`, `border-rose-800/50`

**Warning:**
- Light: `bg-amber-50`, `text-amber-800`, `border-amber-200`
- Dark: `bg-amber-950/30`, `text-amber-200`, `border-amber-800/50`

**Info:**
- Light: `bg-blue-50`, `text-blue-800`, `border-blue-200`
- Dark: `bg-blue-950/30`, `text-blue-200`, `border-blue-800/50`

---

## Typography

### Font Family

- **Primary:** `'Instrument Sans'` (from Google Fonts via Bunny Fonts)
- **Fallback:** `ui-sans-serif, system-ui, sans-serif`

### Font Weights

- **Regular:** `400`
- **Medium:** `500`
- **Semibold:** `600`
- **Bold:** `700`

### Font Sizes

- **Page Title:** `text-3xl font-bold` (30px)
- **Section Title:** `text-xl font-semibold` (20px)
- **Card Title:** `text-lg font-semibold` (18px)
- **Body:** `text-sm` (14px) or `text-base` (16px)
- **Small:** `text-xs` (12px)

### Line Heights

- **Tight:** `tracking-tight` (for headings)

---

## Spacing & Sizing

### Common Spacing Patterns

- **Page Container:** `p-6 lg:p-8`
- **Card Padding:** `p-6` (default), `p-8` (large)
- **Section Spacing:** `space-y-8` (between major sections)
- **Form Spacing:** `space-y-6` (between form fields)
- **Button Gap:** `gap-3` or `gap-4`

### Component Sizes

- **Navbar Height:** `h-16` (64px)
- **Sidebar Width:** `w-64` (256px)
- **Icon Sizes:** `w-5 h-5` (small), `w-6 h-6` (medium)
- **Avatar Size:** `h-8 w-8` (32px)

---

## Dark Mode

The theme uses Tailwind's built-in dark mode support. All components include dark mode variants using the `dark:` prefix.

### Implementation

Dark mode is automatically applied based on system preference. To add manual toggle functionality, you can add a toggle button that manipulates the `dark` class on the `<html>` element.

### Dark Mode Patterns

All components follow this pattern:
```blade
bg-white dark:bg-slate-800/50
text-slate-900 dark:text-slate-100
border-slate-200 dark:border-slate-700
```

---

## Component Examples

### Page Header Pattern

```blade
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Page Title</h1>
    <p class="mt-2 text-slate-600 dark:text-slate-400">
        Page description or subtitle.
    </p>
</div>
```

### Page Header with Actions

```blade
<div class="flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Page Title</h1>
        <p class="mt-2 text-slate-600 dark:text-slate-400">
            Page description.
        </p>
    </div>
    <div class="flex items-center gap-3">
        <x-admin.ui.button variant="secondary">Secondary Action</x-admin.ui.button>
        <x-admin.ui.button variant="primary">Primary Action</x-admin.ui.button>
    </div>
</div>
```

### Form Layout

```blade
<x-admin.ui.card>
    <form action="..." method="POST" class="space-y-6">
        @csrf
        
        <x-admin.ui.input
            name="name"
            label="Name"
            placeholder="Enter name"
            required
        />
        
        <div class="flex items-center gap-4 pt-4 border-t border-slate-200 dark:border-slate-700">
            <x-admin.ui.button type="submit" variant="primary">
                Submit
            </x-admin.ui.button>
            <a href="..." class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                Cancel
            </a>
        </div>
    </form>
</x-admin.ui.card>
```

### Table Layout

```blade
<x-admin.ui.card>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-slate-200 dark:border-slate-700">
                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Column Name
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                <tr>
                    <td class="px-6 py-4 text-sm text-slate-900 dark:text-slate-100">
                        Content
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin.ui.card>
```

### Empty State

```blade
<x-admin.ui.card padding="p-8">
    <div class="text-center py-12">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-700/50 mb-4">
            <svg class="w-8 h-8 text-slate-600 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <!-- Icon -->
            </svg>
        </div>
        <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Title</h2>
        <p class="text-slate-600 dark:text-slate-400 max-w-md mx-auto">
            Description text.
        </p>
    </div>
</x-admin.ui.card>
```

---

## JavaScript Functionality

### Sidebar Toggle (Mobile)

Add to `resources/js/app.js` or inline in sidebar component:

```javascript
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    if (sidebarToggle && sidebar && overlay) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    }
});
```

### User Menu Dropdown

```javascript
document.addEventListener('DOMContentLoaded', function() {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');

    if (userMenuButton && userMenuDropdown) {
        userMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            userMenuDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                userMenuDropdown.classList.add('hidden');
            }
        });
    }
});
```

---

## File Structure

```
resources/
├── css/
│   └── app.css (Tailwind configuration)
├── js/
│   └── app.js (JavaScript)
└── views/
    └── admin/
        ├── layouts/
        │   └── app.blade.php (Main layout)
        ├── components/
        │   ├── navbar.blade.php
        │   ├── sidebar.blade.php
        │   ├── footer.blade.php
        │   └── ui/
        │       ├── button.blade.php
        │       ├── card.blade.php
        │       ├── input.blade.php
        │       ├── badge.blade.php
        │       ├── alert.blade.php
        │       └── stat-card.blade.php
        └── [your views]
```

---

## Key Design Principles

1. **Consistency:** All components follow the same design patterns
2. **Accessibility:** Proper focus states, semantic HTML
3. **Responsiveness:** Mobile-first approach with breakpoints
4. **Performance:** Minimal JavaScript, CSS-only animations
5. **Dark Mode:** Full support with proper contrast ratios
6. **Glassmorphism:** Modern backdrop blur effects
7. **Gradients:** Used sparingly for primary actions and highlights
8. **Spacing:** Consistent spacing scale (Tailwind defaults)
9. **Typography:** Clear hierarchy with Instrument Sans font
10. **Shadows:** Subtle shadows with colored variants for depth

---

## Quick Reference

### Common Class Combinations

**Primary Button:**
```
bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30
```

**Card:**
```
bg-white dark:bg-slate-800/50 rounded-2xl border border-slate-200/50 dark:border-slate-700/50 shadow-sm
```

**Input:**
```
w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-blue-500
```

**Page Title:**
```
text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight
```

**Backdrop Blur Navbar:**
```
bg-white/80 dark:bg-slate-900/80 backdrop-blur-lg
```

---

## Notes for Implementation

1. **Component Registration:** Make sure to register Blade components in `app/Providers/AppServiceProvider.php` or use the `@component` directive
2. **Vite Build:** Run `npm run build` for production or `npm run dev` for development
3. **Dark Mode Toggle:** Consider adding a manual dark mode toggle if needed
4. **Customization:** All colors and spacing can be customized by modifying the Tailwind classes
5. **Icons:** The theme uses Heroicons (SVG format). Replace with your preferred icon library if needed

---

## Support

For questions or issues with implementing this theme, refer to:
- [Tailwind CSS v4 Documentation](https://tailwindcss.com/docs)
- [Laravel Blade Components](https://laravel.com/docs/blade#components)
- [Vite Documentation](https://vitejs.dev/)

---

**Theme Version:** 1.0.0  
**Last Updated:** 2024  
**Compatible with:** Laravel 11+, Tailwind CSS 4.0+
