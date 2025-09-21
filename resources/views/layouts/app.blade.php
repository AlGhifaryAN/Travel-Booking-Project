<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Booking')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background: #007bff;
            color: white;
            padding: 10px 20px;
        }
        header a, footer a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }
        main {
            padding: 20px;
            min-height: 80vh;
        }
        table th, table td {
            vertical-align: middle;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<header>
    <div class="container d-flex align-items-center">
        <a href="/" class="me-3">Home</a>

        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="me-3">Admin Dashboard</a>
            @else
                <a href="{{ route('passenger.dashboard') }}" class="me-3">Passenger Dashboard</a>
            @endif
            <a href="{{ route('logout') }}">Logout</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</header>

<main class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<footer class="text-center mt-4">
    <div class="container">
        &copy; {{ date('Y') }} Travel Booking System
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
