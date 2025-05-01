<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Healthy Habitat Network') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles (if needed) -->
    <!-- Make sure to include Font Awesome for the social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        .bg-purple {
            background-color: #6f42c1;
            color: white;
        }
        .nav-link {
            color: #555; /* normal text color */
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #f0f0f0;
            color: #222;
        }

        .nav-link.active {
            background-color: #2E8B57; /* nice primary color */
            color: #fff; /* white text */
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(70, 229, 197, 0.3); /* light shadow */
        }
        .activeNav {
            background-color: #2E8B57; /* nice primary color */
            color: #fff; /* white text */
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(70, 229, 197, 0.3); /* light shadow */
        }
        .activeNav:hover {
            background-color: #42855f; /* nice primary color */
            color: #fff; /* white text */
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(70, 229, 197, 0.3); /* light shadow */
        }

    </style>
</head>
<body>
<div id="app">

    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

{{--    @include('layouts.footer')--}}
</div>

<!-- Bootstrap JS Bundle with Popper from CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
