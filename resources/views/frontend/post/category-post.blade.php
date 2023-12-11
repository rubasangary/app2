@extends('frontend.components.layouts')

@section('title', "$category->meta_title")

@section('content')


<nav x-data="{ isOpen: false }" class="relative z-10 dark:bg-gray-900">
    <div @click.away="isOpen = false" class="container px-2 py-1 mx-auto lg:flex lg:justify-between lg:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-md text-gray-800 transition-colors duration-300 transform dark:text-gray-200 lg:text-md lg:font-semibold" href="/">
                    <i class="fa-solid fa-house mr-1" style="color: #477af0;"></i>
                    வளர்க
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


<div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 mt-3 lg:mt-6 mx-3 lg:mx-16">
    <div class="w-full lg:w-1/2 xl:w-2/3 2xl:w-3/4 bg-white dark:bg-gray-800 rounded-lg h-full">
        <div class="grid-cols-1 sm:grid md:grid-cols-2 ">
            @forelse ($posts as $post)
            <div class="mx-2 mt-2 flex flex-col self-start rounded-lg shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <a href="">
                    <img src="{{ asset('/storage/blogPost/' . $post->image) ?? '' }}" class="p-4 rounded-lg" alt="">
                </a>
                <div class="mt-2 md:p-4">
                    <a href="{{ route('view-post', [$post->category->slug , $post->slug]) }}">
                        <h5 class="mb-3 text-md font-semibold leading-tight text-gray-800 dark:text-gray-300">
                            {{ $post->title }}
                        </h5>
                    </a>
                    <p class="mb-4 text-sm text-gray-800 dark:text-gray-400">
                        {{ $post->content}}
                    </p>
                    <div>
                        <a href="{{ route('user.showblogs', $post->postUser->slug) }}">
                            <div class="flex lg:items-center">
                                <div>
                                    <p class="text-xs dark:text-gray-300">Posted By:</p>
                                    <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize">{{ $post->postUser->name }}</p>
                                </div>
                                <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $post->postUser->profile_photo_url }}">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            @empty
                {{-- @if (!$hasBlogs) --}}
                <p class="p-10 mb-3 text-md font-semibold leading-tight text-gray-800 dark:text-gray-300">Currently no posts available in this category - {{ $category->name }}.</p>
                {{-- @endif --}}
            @endforelse
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-1/3 2xl:w-1/4 bg-white dark:bg-gray-800 rounded-lg h-full">
            <!-- component -->
            <div class="bg-white p-4 lg:rounded-md lg:shadow-md lg:overflow-hidden dark:text-gray-300 dark:bg-gray-800">
                <h3 class="text-lg mb-4 font-semibold">Featured</h3>

                    @foreach ($latestPost as $latest)
                    <div class="md:mt-6 flex flex-shrink-0">
                        <div class="w-4/12">
                            <a href="{{ route('view-post', [$latest->category->slug , $latest->slug]) }}">
                                <img class="width-full lg:object-cover md:object-scale-down mb-3 lg:w-36 lg:h-24 lg:rounded transform hover:scale-110 transition duration-500" src="{{ asset('/storage/blogPost/' . $latest->image) ?? '' }}" alt="">
                            </a>
                        </div>
                        <div class="w-8/12 ml-2">
                            <a href="{{ route('view-post', [$latest->category->slug , $latest->slug]) }}">
                                <h5 class="text-xs text-gray-700 dark:text-gray-300 group-hover:text-blue-500 transition mb-3">{{ $latest->title }}</h5>
                            </a>

                            <a href="{{ route('user.showblogs', $latest->postUser->slug) }}">
                                <div class="flex lg:items-center">
                                        <div class="lg:pl-2">
                                            <p class="text-xs">Posted By:</p>
                                            <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize"> {{ $latest->postUser->name }}</p>
                                        </div>
                                        <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $latest->postUser->profile_photo_url }}">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
            </div>
                <!-- component -->
    </div>

</div>


@endsection
