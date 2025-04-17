<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles (Tailwind CSS assumed) -->
    @vite(['resources/css/app.css'])
</head>
<body>
@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-md mb-4">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif
    @yield('content')
</body>
</html>