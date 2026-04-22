<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enginco Activity-Finals: Using ORM</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    @stack('scripts')
</body>
</html>