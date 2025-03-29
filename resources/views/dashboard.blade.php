<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}?v={{ time() }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
    <header class="header">
        <nav class="navbar">
            @guest
            <a href="{{ route('login') }}">Home</i></a>
            <a href="#">Login</a>
            <a href="#">Create User</a>
            @else
            <a href="{{ route('list') }}">Home</i></a>
            <a href="{{ route('signout') }}">Logout</a>
            @endguest
        </nav>
    </header>

    <div class="background"></div>
    @yield('content')
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>