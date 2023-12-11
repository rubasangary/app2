@extends('user.components.layouts')

@section('content')

<div class="fade">

        <h4 class="font-semibold mt-4 mb-6 text-gray-700 dark:text-gray-300"><i class="fa-solid fa-drum fa-lg mr-3" style="color: #0a5ae6;"></i><span>ஊர் புதினம்</span></h4>

         <!-- Breadcrumbs -->
         <div class="mt-2">
            <div class="flex items-start space-x-1 text-gray-400 text-md">

                <a href="{{ url()->previous() }}" class="font-semibold hover:underline hover:text-gray-300 dark:text-gray-400">
                    Go Back
                <span>
                    <i class="fa-solid fa-circle-arrow-left p-2" style="color: #105ada;"></i>
                </span>
                </a>
            </div>
        </div>
    <!-- Breadcrumbs ends -->


        @include('toast.message')


        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 mt-6">


                {{--left column start --}}
                <div class="w-full lg:w-1/2 xl:w-2/3 2xl:w-3/4 rounded-lg h-full">



                        {{-- Card start --}}

                        <div class="block rounded-lg border border-gray-300 bg-transparent dark:border-gray-700 bg-white dark:bg-gray-800">

                            <div class="border-b-2 relative border-gray-300 px-6 py-3 text-gray-700 dark:border-gray-700 dark:text-gray-300 flex justify-between">
                                <div>
                                    <p class="font-semibold capitalize">{{ $forum->forumPostedBy->name }}</p>
                                </div>

                                <div x-data="{open:false}" @click.away="open = false">
                                    <div class="">
                                        <a @click="open=!open"><i class="fa-solid fa-ellipsis fa-lg" style="color: #7f8794;"></i></a>
                                    </div>
                                    <div x-show="open" class="absolute right-0">
                                        <a  class="px-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-blue-700 hover:bg-blue-500 transition-500"
                                         href="{{ route('forum.edit', $forum->id) }}">
                                            Edit
                                        </a>
                                            <form action="{{ route('forum.user.destroy', $forum->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button  class="px-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-blue-700 hover:bg-blue-500 transition-500" href="{{ $forum->id }}">
                                                    Delete
                                                </button>
                                            </form>
                                    </div>
                                </div>
                            </div>

                            {{-- body start --}}
                            <div class="p-6">
                                <p class="text-base pl-10 lg:pl-16 text-gray-600 dark:text-gray-300">
                                    {{ $forum->content }}
                                </p>
                            </div>
                            {{-- body end --}}

                            <div class="border-t-2 border-gray-300 px-6 py-3 text-gray-700 dark:border-gray-700 dark:text-gray-300 flex justify-between">

                                <div>
                                    Footer
                                </div>
                                <div>
                                    Likes
                                </div>
                            </div>

                        </div>

                            {{-- Card end --}}


                            {{-- Comments start --}}
                            <form class="mb-6 mt-12" action="{{ route('forum.comments.store', $forum->id) }}" method="POST">
                                @csrf
                                <h3 class="mb-3 font-xl font-semibold text-gray-700 dark:text-gray-300">Write Your Comments</h3>
                                <textarea class="w-full text-gray-700 dark:border-gray-700 dark:text-gray-300 p-2 bg-white dark:bg-gray-800" name="content" id="" cols="" rows="" placeholder="Write Comment..."></textarea>
                                <button type="submit" class="px-2 mt-2 font-semibold text-white bg-violet-700 hover:bg-violet-500 rounded"><i class="fa-solid fa-pen fa-sm mr-2" style="color: #ffffff;"></i></i>Comment</button>

                                @error('content')
                                <span class="text-red-400"> {{ $message }}</span>
                                @enderror
                            </form>


                            @foreach ( $forum->comments as $comment )

                                <div class="p-6 text-base pl-10 py-3 lg:pl-16 bg-white text-gray-600 dark:text-gray-300  dark:bg-gray-800">
                                    <p class="">
                                        {{ $comment->content }}
                                    </p>
                                </div>

                            @endforeach


                            {{-- Comments end --}}

                </div>
                {{--left column end --}}



                <div class="w-full lg:w-1/2 xl:w-1/3 2xl:w-1/4 bg-white rounded-lg h-full dark:bg-gray-800">

                    <div class="my-4 p-3">
                        <form action="{{ route('forum') }}" method="GET">
                            @csrf
                        <input name="search" class="w-2/3 h-8 rounded text-gray-700 dark:text-gray-300 p-2 bg-white dark:bg-gray-800" type="text" aria-label="Search">
                        <button type="submit" class="text-white font-semibold py-1 px-2 bg-violet-700 hover:bg-violet-500 rounded">
                            <i class="fa-solid fa-magnifying-glass fa-md mr-2" style="color: #ffffff;"></i>
                            Search
                        </button>
                        </form>
                    </div>

                </div>

        </div>

        <!-- end::Messages -->

</div>
@endsection


