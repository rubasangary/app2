@extends('frontend.components.layouts')
@section('title', 'Tamil Bloggers and Buy and Sell')
@section('content')


<nav x-data="{ isOpen: false }" class="relative z-10 dark:bg-gray-900">
    <div @click.away="isOpen = false" class="container px-2 py-1 mx-auto lg:flex lg:justify-between lg:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-md text-gray-800 transition-colors duration-300 transform dark:text-gray-200 lg:text-md lg:font-semibold" href="/">
                    <i class="fa-solid fa-house mr-1" style="color: #477af0;"></i>
                    முகப்பு
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button x-cloak @click="isOpen = true" type="button" class="text-gray-900 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                    <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-900 dark:text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                    </svg>
                </button>

                <div  x-show="isOpen" >
                <button x-cloak @click="isOpen = false">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-900 dark:text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-0 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-900 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 md:flex lg:items-center">
                    <div>


                            <div x-data="{ open: false }" class="relative lg:flex lg:space-x-5">
                                @foreach ($menuItems as $menuItem)

                                <button x-on:click="open = true"
                                    class=" hover:bg-blue-700 lg:focus:ring-1 focus:outline-none focus:ring-blue-300 rounded-lg px-3 py-1 text-center inline-flex items-center lg:dark:hover:bg-blue-700 lg:dark:focus:ring-blue-800 text-md text-gray-700 lg:font-semibold transition-colors duration-300 transform dark:text-gray-300  hover:text-white dark:hover:text-gray-300"
                                    type="button">
                                    <a href="{{ url( 'tamil-bloggers/'.$menuItem->slug ) }}">{{ $menuItem->name }}</a>
                                </button>

                                <hr class="lg:hidden border-gray-200 dark:border-gray-700 mt-1">
                                @endforeach
                            </div>

                    </div>
                </div>
        </div>
    </div>
</nav>
<!-- Mobile menu end -->


<main class="bg-gray-100 min-h-screen mt-4 dark:bg-gray-900 z-0">
    <div class="block md:container md:flex md:mx-auto">

        <!-- Main post section start -->
        <div class="lg:w-8/12 md:w-2/3 bg-white lg:rounded-md lg:shadow-md dark:text-gray-300 dark:bg-gray-800">

            <div  class="block lg:grid lg:grid-cols-2 lg:p-2 mt-4">


                <div class="p-1">
                    <div class="bg-white dark:bg-gray-800 p-4 mb-2 shadow-md rounded-sm">
                        <a href="" class="overflow-hidden block">
                            <img src="https://imgv3.fotor.com/images/slider-image/A-clear-image-of-a-woman-wearing-red-sharpened-by-Fotors-image-sharpener.jpg" alt=""
                            class="w-full h-60 object-cover rounded transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="mt-3">
                            <a href="">
                                <h2 class="mt-3 text-xl font-semibold text-gray-700 hover:text-blue-500 dark:text-gray-300">
                                    It is a long established fact that a content of a page when looking at its layout.
                                </h2>
                            </a>
                            <div class="flex mt-3 items-center text-gray-600 dark:text-gray-400">
                                <span class="mr-2 text-sm">
                                    <i class="fa fa-clock"></i>
                                </span>
                                June 11 2020
                            </div>
                        </div>

                    </div>
                </div>



                <div class="p-1">
                    <div class="bg-white dark:bg-gray-800 p-4 mb-2 shadow-md rounded-sm">
                        <a href="" class="overflow-hidden block">
                            <img src="https://imgv3.fotor.com/images/slider-image/A-clear-image-of-a-woman-wearing-red-sharpened-by-Fotors-image-sharpener.jpg" alt=""
                            class="w-full h-60 object-cover rounded transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="mt-3">
                            <a href="">
                                <h2 class="mt-3 text-xl font-semibold text-gray-700 hover:text-blue-500 dark:text-gray-300">
                                    It is a long established fact that a content of a page when looking at its layout.
                                </h2>
                            </a>
                            <div class="flex mt-3 items-center text-gray-600 dark:text-gray-400">
                                <span class="mr-2 text-sm">
                                    <i class="fa fa-clock"></i>
                                </span>
                                June 11 2020
                            </div>
                        </div>

                    </div>
                </div>


                @foreach ($latest as $latest)
                <div class="p-1">
                    <div class="bg-white dark:bg-gray-800 p-4 mb-2 shadow-md rounded-sm">
                        <a href="" class="overflow-hidden block">
                            <img src="{{ asset('/storage/blogPost/' . $latest->image) ?? '' }}" alt=""
                            class="w-full object-cover rounded transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="mt-3">

                            <a href="{{ route('category-post', $latest->category->slug) }}" class="text-blue-700 text-sm font-bold uppercase">{{ $latest->category->name }}</a>

                            <a href="{{ route('view-post', [$latest->category->slug , $latest->slug]) }}">
                                <h2 class="mt-2 text-md text-gray-700 hover:text-blue-500 dark:text-gray-300">
                                    {{ $latest->title }}
                                </h2>
                            </a>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('user.showblogs', $latest->postUser->slug) }}">
                                    <div class="flex lg:items-center">
                                        <div>
                                            <p class="text-xs">Posted By:</p>
                                            <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize"> {{ $latest->postUser->name }}</p>
                                        </div>
                                        <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $latest->postUser->profile_photo_url }}">
                                    </div>
                                </a>
                                <div>
                                    <p class="mt-2">{{ $latest->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach



            </div>
        </div>
        <!-- Main post section end  -->


        <!-- Side bar start  -->
        <div class="md:w-4/12">
            <div>

                <div class="lg:ml-8 p-2 lg:px-4 lg:py-4 bg-white lg:rounded-md lg:shadow-md dark:text-gray-300 dark:bg-gray-800">
                    <h3 class="pl-2 text-lg mb-4 font-semibold">Latest Stories</h3>

                    <div>
                        <div class="grid grid-cols-2 gap-2 lg:overflow-hidden lg:item-center lg:justify-between">

                            @foreach ($latestPosts as $latestPost)
                            <div class="p-2 mb-2">
                                <a href="" class="group">
                                    <div class="block lg:flex-shrink-0">
                                        <a href="{{ route('view-post', [$latestPost->category->slug , $latestPost->slug]) }}">
                                            <img class="width-full lg:object-cover lg:w-48 lg:h-24 rounded lg:overflow-hidden lg:transform hover:scale-110 transition duration-500" src="{{ asset('/storage/blogPost/' . $latestPost->image) ?? '' }}" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('view-post', [$latestPost->category->slug , $latestPost->slug]) }}">
                                            <h6 class="py-6 text-xs text-gray-700 dark:text-gray-300 group-hover:text-blue-500 transition">{{ $latestPost->title }}</h6>
                                        </a>

                                        <a href="{{ route('user.showblogs', $latest->postUser->slug) }}">
                                            <div class="flex lg:items-center lg:justify-between lg:bg-gray-200 dark:bg-gray-700 lg:rounded-r-full">
                                                <div class="lg:pl-2">
                                                    <p class="text-xs">Posted By:</p>
                                                    <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize"> {{ $latestPost->postUser->name }}</p>
                                                </div>
                                                <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $latestPost->postUser->profile_photo_url }}">
                                            </div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>





                <div class="lg:ml-8 my-6 px-4 py-4 bg-white lg:rounded-md lg:shadow-md lg:overflow-hidden dark:text-gray-300 dark:bg-gray-800">
                    <h3 class="text-lg mb-4 font-semibold">Shared Videos</h3>

                    <div class="space-y-6">

                        @foreach ($latestPosts as $latestPost)
                        <div class="md:mt-6 flex flex-shrink-0">
                                <div class="w-4/12">
                                    <a href="{{ route('view-post', [$latestPost->category->slug , $latestPost->slug]) }}">
                                        <img class="width-full lg:object-cover md:object-scale-down mb-3 lg:w-36 lg:h-24 lg:rounded transform hover:scale-110 transition duration-500" src="{{ asset('/storage/blogPost/' . $latestPost->image) ?? '' }}" alt="">
                                    </a>
                                </div>
                                <div class="w-8/12 ml-2">
                                    <a href="{{ route('view-post', [$latestPost->category->slug , $latestPost->slug]) }}">
                                        <h5 class="text-xs text-gray-700 dark:text-gray-300 group-hover:text-blue-500 transition mb-3">{{ $latestPost->title }}</h5>
                                    </a>

                                    <a href="{{ route('user.showblogs', $latest->postUser->slug) }}">
                                    <div class="flex lg:items-center">

                                            <div class="lg:pl-2">
                                                <p class="text-xs">Posted By:</p>
                                                <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize"> {{ $latestPost->postUser->name }}</p>
                                            </div>

                                            <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $latestPost->postUser->profile_photo_url }}">

                                    </div>
                                    </a>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>



                <div class="lg:ml-8 lg:p-2 px-4 bg-white  rounded-md shadow-md dark:text-gray-300 dark:bg-gray-800">
                    <div class="w-full bg-white shadow flex flex-col items-center justify-between dark:text-gray-200 dark:bg-gray-800">
                        <p class="text-xl font-semibold pb-4">படங்கள்</p>

                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($randImage as $image)
                            <div class="block">
                                <a href="{{ route('show.image') }}"><img class="hover:opacity-75 h-48 w-48" src="{{ asset('/storage/pictures/' . $image->image )}}"></a>
                                <a href="{{ route('user.showImage', [$image->imageSharedBy->slug]) }}"><p class="text-center mt-1 bg-blue-700 hover:bg-blue-500 rounded capitalize">{{ $image->imageSharedBy->name }}</p></a>
                            </div>
                            @endforeach
                        </div>

                        <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-2 mt-6">
                            <i class="fa-solid fa-image fa-lg mr-3"></i> More Images
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Side bar end  -->

    </div>
</main>






@endsection
