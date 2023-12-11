<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', '') }}</title>

    <meta property="og:title" content=" @yield('title') " />
    <meta property="og:description" content=" @yield('meta_description') " />
    <meta property="og:url" content=" @yield('url') " >
    <meta name="meta_keyword" content=" @yield('meta_keyword') " >
    <meta property="og:image" content="@yield('image')" />

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="your_nonce_value"></script>

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
  <body x-cloak :class="{ 'theme-dark': dark }" x-data="data()">

    <div class="flex h-screen bg-gray-100 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    <!-- Desktop sidebar -->
    @include('frontend.components.sidebar')
    <!-- Desktop sidebar -->


            <div class="flex flex-col flex-1 w-full">

                <!-- Navbar -->
                @include('header.navbar')

                <!-- Navbar -->


                <!-- section -->
                <main class="h-full overflow-y-auto">
                    <div class="container px-4 mx-auto grid dark:text-gray-200">

                        @yield('content')

                    </div>
                </main>
                <!-- section -->

            </div>
    </div>

    <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : 'your_app_id',
            xfbml      : true,
            version    : 'v12.0'
          });
        };
      </script>

  </body>
</html>

