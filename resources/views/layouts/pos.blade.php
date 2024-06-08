<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" loading="lazy" href="https://infypos-demo.nyc3.digitaloceanspaces.com/settings/337/logo-80.png" type="image/x-icon">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!-- css icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Vite compiled -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/style-DV3X1tBU.css" data-navigate-track="reload" />
    <script type="module" src="http://127.0.0.1:8000/build/assets/app-C1-XIpUa.js" data-navigate-track="reload"></script>

    <!-- Livewire styles -->
    @livewireStyles
</head>

<body style="font-family: 'Noto Sans', sans-serif;">

    <div class="container-fluid bg-light">
        {{ $slot }}
    </div>

    <!-- Livewire scripts -->
    @livewireScripts
    <!-- Other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
