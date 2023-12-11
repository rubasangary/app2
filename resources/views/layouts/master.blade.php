<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="" content="Valarha">

    <title>@yield('title')</title>

    <meta name="meta_description" content=" @yield('meta_description') " />
    <meta name="meta_keyword" content=" @yield('meta_keyword') " >


    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"/>



      <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />

      <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

        <script src="{{ asset('assets/js/alpine.js') }}" defer ></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak]{
            display: none;
        }
    </style>


  </head>

  <body  :class="{ 'theme-dark': false}" x-data="data()">

    <div class="flex h-screen bg-gray-100 text-gray-700" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        @include('layouts.inc.admin-sidebar')
        <!-- Desktop sidebar -->


            <div class="flex flex-col flex-1 w-full">

                <!-- Navbar -->
                @include('layouts.inc.admin-navbar')

                <!-- Navbar -->


                <!-- section -->
                <main class="h-full mt-10 overflow-y-auto">

                    <div class="container px-4  mx-auto grid dark:text-gray-200">

                        @yield('content')


                    </div>
                </main>
                <!-- section -->

            </div>
    </div>

  </body>
</html>
