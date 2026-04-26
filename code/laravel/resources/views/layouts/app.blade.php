<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        /* Buttons with inline background-color matching #ebee46 get a subtle hover color (D7DA32)
           This targets inline styles and keeps behavior scoped to those elements only. */
        button[style*="#ebee46"], .btn[style*="#ebee46"], button[style*="ebee46"], .btn[style*="ebee46"] {
            transition: background-color .12s ease;
        }
        button[style*="#ebee46"]:hover, .btn[style*="#ebee46"]:hover, button[style*="ebee46"]:hover, .btn[style*="ebee46"]:hover {
            background-color: #D7DA32 !important;
        }
    </style>
</head>
<body>
    @yield('body')
</body>
</html>

