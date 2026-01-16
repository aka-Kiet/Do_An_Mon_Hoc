<!DOCTYPE html>
<html lang="vi" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $viewData['title'] }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_indext.css') }}">

    {{-- Định vị vị trí sẽ chèn css riêng --}}
    @stack('styles')

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        // Light Mode Colors (Vintage/Cozy)
                        'brown-primary': '#8D6E63',
                        'brown-dark': '#5D4037',
                        
                        // Dark Mode Colors (Modern/Cyberpunk)
                        'dark-bg-start': '#0f172a', // Slate 900
                        'dark-bg-end': '#020617',   // Slate 950
                        'neon-red': '#FF1744',
                        'neon-glow': 'rgba(255, 23, 68, 0.6)',
                    }
                }
            }
        }
    </script>

    
</head>

<body class="bg-gradient-light text-stone-800 dark:bg-gradient-dark dark:text-slate-200 min-h-screen">

    @include('partials.layouts.header')

    @yield('content')

    @include('partials.layouts.footer')

    @include('partials.layouts.login')

    @include('partials.layouts.register')

    @include('partials.layouts.chat')

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="js/script_popup.js"></script>

    {{-- Định vị vị trí sẽ chèn js riêng --}}
    @stack('scripts')
</body>
</html>