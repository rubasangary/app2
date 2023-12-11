<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="ta"> <!-- Language set to Tamil -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="Ruban" content="Valarha">

    <title>@yield('title')</title>

    <meta name="meta_description" content="@yield('meta_description')" />
    <meta name="meta_keyword" content="@yield('meta_keyword')" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none;
        }
    </style>

</head>
<body>
    <!-- Your page content here -->
    <div x-cloak class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    <!-- Desktop sidebar -->
    @include('user.components.sidebar')
    <!-- Desktop sidebar -->


      <div class="flex flex-col flex-1 w-full">

        <!-- Navbar -->
        @include('header.navbar')

        <!-- Navbar -->


        <!-- section -->
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mt-2 mx-auto grid dark:text-gray-200">

                @yield('content')

            </div>
          </main>
        <!-- section -->

      </div>
    </div>

    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script src="{{ asset('assets/js/alpine.js') }}" defer></script>
</body>
</html>
