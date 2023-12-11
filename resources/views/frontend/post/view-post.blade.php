@extends('frontend.components.layouts')

@section('title', $post->title)
@section('meta_description', $post->meta_description)
@section('image', $post->image)
@section('url', $post->url)
@section('meta_keyword', $post->meta_keyword)

@section('content')


<nav x-data="{ isOpen: false }" class="relative z-10 dark:bg-gray-900">
    <div @click.away="isOpen = false" class="container px-1 py-2 mx-auto lg:flex lg:justify-between lg:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-sm font-semibold text-gray-800 transition-colors duration-300 transform dark:text-gray-200 lg:text-lg" href="/">
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
                                    class=" hover:bg-blue-700 lg:focus:ring-1 focus:outline-none focus:ring-blue-300 rounded-lg px-3 py-1 text-center inline-flex items-center lg:dark:hover:bg-blue-700 lg:dark:focus:ring-blue-800 text-lg text-gray-700 lg:font-semibold transition-colors duration-300 transform dark:text-gray-300 lg:text-base hover:text-white dark:hover:text-gray-300"
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

    <div class="w-full lg:w-2/12 bg-white dark:bg-gray-800 rounded-lg h-full">
        <div class="my-4">
            <!-- component -->
            <div class="flex items-center justify-center">
                <div class="font-semibold text-center">
                    <a href="{{ route('user.showblogs', $post->postUser->slug) }}">
                        <img class="mb-3 w-16 h-16 lg:w-32 lg:h-32 rounded-full shadow-lg mx-auto object-cover" src="{{ $post->postUser->profile_photo_url }}" alt="Post User">
                        <h1 class="text-md lg:text-lg text-gray-800 dark:text-gray-300 capitalize"> {{ $post->postUser->name }} </h1>
                    </a>

                    @if (optional($post->postUser->setting)->about)
                    <p class="text-xs text-gray-800 dark:text-gray-400 px-2 mt-4">{{ $post->postUser->setting->about }}</p>
                    @else
                        <p class="text-gray-500"></p>
                    @endif
                    <div class="mt-8">
                        <a href="{{ route('userinfo-view', ['slug' => $post->postUser->slug]) }}" class="bg-blue-500 px-2 rounded-lg">More Details</a>
                    </div>
                </div>
            </div>
            <!-- component -->
        </div>
    </div>



    <div class="w-full lg:w-7/12 bg-white dark:bg-gray-800 rounded-lg h-full">
        <div class="md:px-12 md:py-4">
            <div class="">
                    <img src="{{ asset('/storage/blogPost/' . $post->image) ?? '' }}" class="rounded-lg" alt="">

                    <div class="flex justify-between">
                        <div class="mt-4 text-gray-800 dark:text-gray-400">
                            <livewire:post-likes :post="$post" />
                        </div>
                        <div class="mt-4 text-gray-800 dark:text-gray-400">
                            <p><i class="fa-solid fa-eye fa-lg" style="color: #045bf1;"></i> {{ $post->view_count }} Views</p>
                        </div>
                        <div class="mt-4 text-gray-800 dark:text-gray-400">

                        <div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button" data-size="large">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                        </div>
                        </div>
                    </div>

                <div class="mt-6">
                    <h5 class="mb-3 text-lg font-semibold leading-tight text-gray-800 dark:text-gray-300">
                        {{ $post->title }}
                    </h5>
                    <div>
                        <p class="mt-3 mb-4 text-md text-gray-800 dark:text-gray-400">{{ $post->created_at->format("m/d/Y") }}
                    </div>
                    <p class="mb-8 text-md text-gray-800 dark:text-gray-400 tracking-wide leading-relaxed">
                        {{ $post->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-3/12 bg-white dark:bg-gray-800 rounded-lg h-full">

             <!-- component -->
             <div class="bg-white lg:rounded-md lg:shadow-md lg:overflow-hidden dark:text-gray-300 dark:bg-gray-800">
                <h3 class="text-lg py-2 px-2 font-semibold">Featured</h3>

                    @foreach ($latestPosts as $latest)
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


@livewireScripts

@endsection
