<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" loading="lazy" href="http://127.0.0.1:8000/store-img/logo.png" type="image/x-icon">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!-- css icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Vite compiled CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/style-CTm_-oQ3.css" data-navigate-track="reload" />
    <script type="module" src="http://127.0.0.1:8000/build/assets/app-C1-XIpUa.js" data-navigate-track="reload"></script>

    <!-- Livewire styles -->
    @livewireStyles

    <!-- Other styles -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            font-size: 0.875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
             * Sidebar
             */

        .sidebar {
            position: fixed;
            top: 0;
            /* rtl:raw:
              right: 0;
              */
            bottom: 0;
            /* rtl:remove */
            left: 0;
            z-index: 100;
            /* Behind the navbar */
            padding: 48px 0 0;
            /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #727272;
        }

        .sidebar .nav-link.active {
            color: #2470dc;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        /*
             * Navbar
             */

        .navbar-brand {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, 0.25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.25);
        }

        .navbar .navbar-toggler {
            top: 0.25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: 0.75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.25);
        }

    </style>
</head>

<body style="font-family: 'Noto Sans', sans-serif;">

    {{ $slot }}

    <!-- Livewire scripts -->
    @livewireScripts

    <!-- Other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>

</body>

</html>
