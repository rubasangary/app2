@extends('frontend.components.layouts')

@section('content')


        <!-- seller bammer -->
         @include('frontend.components.banner')
         <!-- seller bammer -->



    {{-- <h4 class="text-xl font-semibold mt-24 mb-4">ஊர் புதினம்</h4> --}}

    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 mt-16 md:mt-18 lg:mt-20">
        <div class="w-full lg:w-1/2 xl:w-2/3 2xl:w-3/4 bg-white dark:bg-gray-800 rounded-lg h-full">
            <div class="grid-cols-1 sm:grid md:grid-cols-2 ">
                @forelse ($blogs as $post)
                <div class="mx-2 mt-2 flex flex-col self-start rounded-lg shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                    <a href="">
                        <img src="{{ asset('/storage/blogPost/' . $post->image) ?? '' }}" class="p-4 rounded-lg" alt="">
                    </a>
                    <div class="mt-2 md:p-4">
                        <h5 class="mb-3 text-md font-semibold leading-tight text-gray-800 dark:text-gray-300">
                            {{ $post->title }}
                        </h5>
                        <p class="mb-4 text-sm text-gray-800 dark:text-gray-400">
                            {{ $post->description }}
                        </p>
                    </div>
                </div>

                @empty
                    @if (!$hasBlogs)
                        <p class="p-10">You haven't posted any articles yet.</p>
                    @endif
                @endforelse
            </div>
        </div>

        <div class="w-full lg:w-1/2 xl:w-1/3 2xl:w-1/4 bg-white dark:bg-gray-800 rounded-lg h-full">
            <div class="my-4">
                <!-- component -->
                <div class="flex items-center justify-center">
                    <div class="font-semibold text-center">

                            <img class="mb-3 w-16 h-16 lg:w-32 lg:h-32 rounded-full shadow-lg mx-auto object-cover" src="{{ $post->postUser->profile_photo_url }}" alt="Post User">
                            <h1 class="text-md lg:text-lg text-gray-800 dark:text-gray-300 capitalize"> {{ $post->postUser->name }} </h1>

                            @if (optional($post->postUser->setting)->about)
                            <p class="text-xs text-gray-800 dark:text-gray-400 px-2 mt-4"> {{ $post->postUser->setting->about }}</p>
                            @else
                                <p class="text-gray-500"></p>
                            @endif

                            <!-- social links -->
                            <div class="mt-6 text-center">

                                <!-- facebook -->
                                @if (optional($post->postUser->setting)->facebook)
                                    <a href="{{ $post->postUser->setting->facebook }}"><i class="fa-brands fa-square-facebook fa-2xl p-4" style="color: #1f66e0;"></i></i></a>
                                @else
                                    <i class="fa-brands fa-square-facebook fa-2xl p-4" style="color: #1f66e05d;"></i>
                                @endif

                                <!-- youtube -->
                                @if (optional($post->postUser->setting)->youtube)
                                    <a href="{{ $post->postUser->setting->youtube }}"><i class="fa-brands fa-youtube fa-2xl p-4" style="color: #eb4040;"></i></a>
                                @else
                                    <i class="fa-brands fa-youtube fa-2xl p-4" style="color: #eb404071;"></i>
                                @endif

                                <!-- instagram -->
                                @if (optional($post->postUser->setting)->instagram )
                                    <a href="{{ $post->postUser->setting->instagram  }}"><i class="fa-brands fa-instagram fa-2xl p-4" style="color: #f0246b;"></i></a>
                                @else
                                    <i class="fa-brands fa-instagram fa-2xl p-4" style="color: #f0246b6c;"></i>
                                @endif

                                <!-- pinterest -->
                                @if (optional($post->postUser->setting)->pinterest)
                                    <a href="{{ $post->postUser->setting->pinterest }}"><i class="fa-brands fa-pinterest fa-2xl p-4" style="color: rgb(230, 65, 65);"></i></a>
                                @else
                                    <i class="fa-brands fa-pinterest fa-2xl p-4" style="color: rgba(230, 65, 65, 0.445);"></i>
                                @endif

                            </div>
                            <!-- social links -->

                        <div class="mt-8"><a href="{{ route('userinfo-view', ['slug' => $post->postUser->slug]) }}" class="bg-blue-500 text-gray-100 px-2 py-1 rounded-lg">More Details</a></div>
                    </div>
                </div>
                <!-- component -->
            </div>
        </div>
    </div>





@endsection
