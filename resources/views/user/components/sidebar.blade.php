<aside class="z-20 hidden w-64 overflow-y-auto bg-black lg:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">


        <ul class="mt-4">
                <li class="flex item-center justify-center mt-6 mx-8">
                    <img class="object-cover w-60 h-36"
                        src="{{ auth()->user()->profile_photo_url }}"
                        alt="Avatar"
                        aria-hidden="true"/>
                </li>

                <a class="flex item-center justify-center text-sm mt-2 py-1 mx-2 text-gray-100 capitalize"
                    href="#">
                    {{ auth()->user()->name }}
                </a>
        </ul>

        <ul class="mt-4">
            <li class="relative px-6 py-2">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700"
                href="/">
                <i class="fa-solid fa-house fa-lg mx-2" style="color: #5c5959;"></i>
                <span>Home</span>
                </a>
            </li>

            <li class="relative px-6 py-2">
                <a href="{{ url('user/ஊர்-புதினம்') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('user/ஊர்-புதினம்*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-drum fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>ஊர் புதினம்</span>
                </a>
            </li>

            <br>

            <li class="relative px-6 py-2">
                <a href="{{ url('user/dashboard') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('user/dashboard*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-gauge fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="relative px-6 py-2">
                <a href="{{ url('user/account') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('user/account*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-address-card fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>My Account</span>
                </a>
            </li>

            <li class="relative px-6 py-2">
                <a href="{{ url('user/settings') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('user/settings*') ? 'bg-blue-700':'' }}">
                    <i class="fa-regular fa-user fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>My Profile</span>
                </a>
            </li>


            <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('user/ads/create*') ? 'bg-blue-700':'' }}
                    {{ Request::is('user/ads/display*') ? 'bg-blue-700':'' }}
                    {{ Request::is('user/ad-pending*') ? 'bg-blue-700':'' }}">
                    <i class="fa-brands fa-adversal fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>விற்பனை செய்ய</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('user.create') }}">
                            விளம்பரப் படிவம்
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('user.display') }}">
                            நிர்வகிக்க
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('pending.ad') }}">
                            காத்திருப்பு
                        </a>
                    </div>
            </li>


            <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('user/job-ad-form*') ? 'bg-blue-700':'' }} ? :
                    {{ Request::is('user/job-ad-display*') ? 'bg-blue-700':'' }} ? :
                    {{ Request::is('user/job-pending*') ? 'bg-blue-700':'' }}">
                    <i class="fa-brands fa-adversal fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>வேலை வாய்ப்பு</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('jobs.form') }}">
                            வேலை படிவம்
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('jobs.display') }}">
                            நிர்வகிக்க
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('user.PendingJobs') }}">
                            காத்திருப்பு
                        </a>
                    </div>
            </li>


            <li class="relative px-6 py-2">
                <a href="{{ route('saved.ad') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('user/saved-ads*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-flag fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>Saved Ads</span>
                </a>
            </li>


            <li class="relative px-6 py-2">
                <a href="{{ route('messages') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('message*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-message fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>Messages</span>
                </a>
            </li>
        </ul>

        <br>

        @if (Auth::user()->role == '2')

        <ul>
            <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700
                {{ Request::is('blog/create-post*') ? 'bg-blue-700':'' }} ? :
                {{ Request::is('blog/share-post*') ? 'bg-blue-700':'' }}
                ">
                <i class="fa-solid fa-feather fa-lg mx-2" style="color: #5c5959;"></i>
                <span>POSTS</span>
                </a>

                <div x-show="open" x-cloak>

                    <a href="{{ route('blogger.create.post') }}" class="pl-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500">
                        <i class="fa-solid fa-pen-to-square fa-lg mx-2" style="color: #dadada;"></i>
                        <span>Write Posts</span>
                    </a>

                    <a href="{{ route('blogger.share.post') }}" class="pl-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500">
                        <i class="fa-regular fa-share-from-square fa-lg mx-2" style="color: #dadada;"></i>
                        <span>Share Posts</span>
                    </a>

                    <a href="{{ route('post.image') }}" class="pl-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500">
                        <i class="fa-regular fa-image fa-lg mx-2" style="color: #ff0505;"></i>
                        <span>Share Pictures</span>
                    </a>

                </div>
            </li>


            <li class="relative px-6 py-2">
                <a href="{{ route('blogger.view.posts') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('blog/view-post*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-newspaper fa-lg fa-lg mx-2" style="color: #5c5959;"></i>
                    <span>View Posts</span>
                </a>
            </li>

        </ul>

        @endif
    </div>
</aside>



<!-- Mobile sidebar -->

<!-- Backdrop -->
<div
x-show="isSideMenuOpen"
x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
></div>

<aside
class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-100 dark:bg-gray-800 lg:hidden"
x-show="isSideMenuOpen"
x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0 transform -translate-x-20"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0 transform -translate-x-20"
@click.away="closeSideMenu"
@keydown.escape="closeSideMenu"
>

<div class="text-gray-800 dark:text-gray-300">

        <ul class="mt-3">
                <li class="flex item-center justify-center">
                    <img class="object-cover w-16 h-16 rounded-full"
                        src="{{ auth()->user()->profile_photo_url }}"
                        alt="Avatar"
                        aria-hidden="true"/>
                </li>
                <a class="flex item-center justify-center mt-2 font-semibold text-gray-800 dark:text-gray-300"
                    href="#">
                    {{ auth()->user()->name }}
                </a>
                <hr class="mx-5 mt-1 border-1 border-gray-300 dark:border-gray-600">
        </ul>

        <ul class="mt-4">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700"
                href="/">
                <i class="fa-solid fa-house fa-lg mx-2" style="color: #36af0e;"></i>
                <span>முகப்பு</span>
                </a>
            </li>

            <br>

            <li class="relative px-6 py-2">
                <a href="{{ url('user/ஊர்-புதினம்') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('user/ஊர்-புதினம்*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-drum fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>ஊர் புதினம்</span>
                </a>
            </li>

            <br>

            <li class="relative px-6 py-3">
                <a href="{{ url('user/settings') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700 {{ Request::is('user/dashboard*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-gauge fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                <a href="{{ url('user/account') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700 {{ Request::is('user/account*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-address-card fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>My Account</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                <a href="{{ url('user/profile') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700 {{ Request::is('user/profile*') ? 'bg-blue-700':'' }}">
                    <i class="fa-regular fa-user fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>My Profile</span>
                </a>
            </li>



            <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700
                {{ Request::is('user/ads/create*') ? 'bg-blue-700':'' }}
                {{ Request::is('user/ads/display*') ? 'bg-blue-700':'' }}
                {{ Request::is('user/ad-pending*') ? 'bg-blue-700':'' }}">
                <i class="fa-brands fa-adversal fa-lg mx-2" style="color: #36af0e;"></i>
                <span>விற்பனை செய்ய</span>
                </a>

                <div x-show="open" x-cloak>
                    <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('user.create') }}">
                        விளம்பரப் படிவம்
                    </a>
                    <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('user.display') }}">
                        நிர்வகிக்க
                    </a>
                    <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('pending.ad') }}">
                        காத்திருப்பு
                    </a>
                </div>
        </li>


        <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-200 hover:bg-blue-700
                {{ Request::is('user/job-ad-form*') ? 'bg-blue-700':'' }} ? :
                {{ Request::is('user/job-ad-display*') ? 'bg-blue-700':'' }} ? :
                {{ Request::is('user/job-pending*') ? 'bg-blue-700':'' }}">
                <i class="fa-brands fa-adversal fa-lg mx-2" style="color: #36af0e;"></i>
                <span>வேலை வாய்ப்பு</span>
                </a>

                <div x-show="open" x-cloak>
                    <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('jobs.form') }}">
                        வேலை படிவம்
                    </a>
                    <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('jobs.display') }}">
                        நிர்வகிக்க
                    </a>
                    <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('user.PendingJobs') }}">
                        காத்திருப்பு
                    </a>
                </div>
        </li>


            <li class="relative px-6 py-2">
                <a href="{{ route('saved.ad') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700 {{ Request::is('user/saved-ads*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-flag fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Saved Ads</span>
                </a>
            </li>


            <li class="relative px-6 py-2">
                <a href="{{ route('messages') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700 {{ Request::is('message*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-message fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Messages</span>
                </a>
            </li>
        </ul>

        <br>

        @if (Auth::user()->role == '2')
        <ul>

            <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700
                {{ Request::is('blog/create-post*') ? 'bg-blue-700':'' }} ? :
                {{ Request::is('blog/share-post*') ? 'bg-blue-700':'' }}
                ">
                <i class="fa-solid fa-feather fa-lg mx-2" style="color: #36af0e;"></i>
                <span>POSTS</span>
                </a>

                <div x-show="open" x-cloak>

                    <a href="{{ route('blogger.create.post') }}" class="pl-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500">
                        <i class="fa-solid fa-pen-to-square fa-lg mx-2" style="color: #dadada;"></i>
                        <span>Write Posts</span>
                    </a>

                    <a href="{{ route('blogger.share.post') }}" class="pl-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500">
                        <i class="fa-regular fa-share-from-square fa-lg mx-2" style="color: #dadada;"></i>
                        <span>Share Posts</span>
                    </a>

                    <a href="{{ route('post.image') }}" class="pl-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500">
                        <i class="fa-regular fa-image fa-lg mx-2" style="color: #ff0505;"></i>
                        <span>Share Pictures</span>
                    </a>

                </div>
            </li>


            <li class="relative px-6 py-2">
                <a href="{{ route('blogger.view.posts') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-1 rounded-md text-gray-800 dark:text-gray-300 hover:bg-blue-700 {{ Request::is('blog/view-post*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-newspaper fa-lg fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>View Posts</span>
                </a>
            </li>

        </ul>

        @endif

</div>
</aside>
