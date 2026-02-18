# ArchFlow Theme - Quick Setup Guide

## ✅ What's Been Created

All theme files have been generated according to the specifications in `THEME_README.md`. Here's what's included:

### Layout Files
- ✅ `resources/views/admin/layouts/app.blade.php` - Main layout
- ✅ `resources/views/admin/components/navbar.blade.php` - Top navigation bar
- ✅ `resources/views/admin/components/sidebar.blade.php` - Sidebar navigation
- ✅ `resources/views/admin/components/footer.blade.php` - Footer component

### UI Components
- ✅ `resources/views/admin/components/ui/button.blade.php` - Button component
- ✅ `resources/views/admin/components/ui/card.blade.php` - Card component
- ✅ `resources/views/admin/components/ui/input.blade.php` - Input component
- ✅ `resources/views/admin/components/ui/badge.blade.php` - Badge component
- ✅ `resources/views/admin/components/ui/alert.blade.php` - Alert component
- ✅ `resources/views/admin/components/ui/stat-card.blade.php` - Stat card component

### Configuration
- ✅ `vite.config.js` - Already configured
- ✅ `resources/css/app.css` - Already configured
- ✅ `resources/js/app.js` - Updated with sidebar toggle and dropdown functionality
- ✅ `app/Providers/AppServiceProvider.php` - Components registered

### Example Page
- ✅ `resources/views/admin/dashboard.blade.php` - Sample dashboard page

## 🚀 Quick Start

### 1. Install Dependencies (if not already done)
```bash
npm install
```

### 2. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 3. Create Routes (Optional)
Add to `routes/web.php`:

```php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
```

### 4. Use the Layout
In your Blade views, extend the layout:

```blade
@extends('admin.layouts.app')

@section('title', 'Your Page Title')

@section('content')
    <!-- Your content here -->
@endsection
```

### 5. Use Components
```blade
<!-- Button -->
<x-admin.ui.button variant="primary">Click Me</x-admin.ui.button>

<!-- Card -->
<x-admin.ui.card>
    Content here
</x-admin.ui.card>

<!-- Input -->
<x-admin.ui.input name="email" label="Email" />

<!-- Badge -->
<x-admin.ui.badge variant="success">Active</x-admin.ui.badge>

<!-- Alert -->
<x-admin.ui.alert type="success" dismissible>
    Success message!
</x-admin.ui.alert>

<!-- Stat Card -->
<x-admin.ui.stat-card title="Users" value="1,234" gradient="from-blue-500 to-blue-600">
    <!-- Icon SVG -->
</x-admin.ui.stat-card>
```

## 📝 Notes

1. **Authentication**: The navbar and sidebar components use `auth()->user()`. Make sure you have authentication set up, or the components will use fallback values.

2. **Routes**: Some components reference routes like `admin.dashboard` and `logout`. You may need to:
   - Create these routes in `routes/web.php`
   - Or update the component files to use your route names

3. **Dark Mode**: Dark mode is automatically applied based on system preference. To add a manual toggle, you can add JavaScript to toggle the `dark` class on the `<html>` element.

4. **Icons**: The theme uses Heroicons (SVG format). You can replace them with your preferred icon library.

## 🎨 Customization

All styling uses Tailwind CSS classes. You can customize:
- Colors: Modify the gradient and color classes
- Spacing: Adjust padding and margin classes
- Typography: Change font sizes and weights
- Components: Edit the component Blade files directly

## 📚 Full Documentation

See `THEME_README.md` for complete documentation including:
- Design tokens
- Color palette
- Typography system
- Component API reference
- Design principles

## ✨ Next Steps

1. Customize the sidebar navigation items
2. Add your application routes
3. Create additional pages using the layout
4. Customize colors and styling to match your brand
5. Add a dark mode toggle if needed

Happy coding! 🎉

