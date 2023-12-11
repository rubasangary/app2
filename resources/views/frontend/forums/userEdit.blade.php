@extends('user.components.layouts')

@section('content')

<div class="fade">
    
        <h4 class="font-semibold mt-4 mb-6 text-gray-700 dark:text-gray-300"><i class="fa-solid fa-drum fa-lg mr-3" style="color: #0a5ae6;"></i><span>ஊர் புதினம்</span></h4>


        @include('toast.message')


        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 mt-6">

                {{--left column start --}}
                <div class="w-full lg:w-1/2 xl:w-2/3 2xl:w-3/4 rounded-lg h-full">

                        @if ( $editing ?? false )

                        <form class="mb-6" action="{{ route('forum.update', $forum->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <textarea class="w-full text-gray-700 dark:border-gray-700 dark:text-gray-300 p-2 bg-gray-100 dark:bg-gray-800" name="content" id="" cols="" rows="">{{ $forum->content }}</textarea>
                            <button type="submit" class="px-2 mt-2 font-semibold text-white bg-violet-700 hover:bg-violet-500 rounded"><i class="fa-solid fa-share fa-sm mr-2"></i>Update</button>

                            @error('content')
                            <span class="text-red-400"> {{ $message }}</span>
                            @enderror
                        </form>

                        @endif

                        {{-- Card start --}}

                        <div class="block rounded-lg border border-gray-300 bg-transparent dark:border-gray-700 bg-white dark:bg-gray-800">

                            <div class="border-b-2 relative border-gray-300 px-6 py-1 text-gray-700 dark:border-gray-700 dark:text-gray-300 flex justify-between">
                                <div class="flex">
                                    @if ($forum->forumPostedBy->profile_photo_url)
                                    <img class="h-10 w-10 rounded-full mr-4" src="{{ $forum->forumPostedBy->profile_photo_url }}">
                                    @else
                                        <img src="/img/man.jpg" width="120">
                                    @endif
                                    <p class="font-semibold capitalize mr-5 mt-3">{{ $forum->forumPostedBy->name }}</p>
                                </div>

                                <div class="mt-3">
                                    {{ $forum->created_at->diffForHumans()  }}
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
                                    @if (auth()->check())
                                    @if (auth()->user()->id == $forum->forumPostedBy->id)
                                        <a href="{{ route('forum.userShow', $forum->id ) }}">
                                            <button class="text-sm font-semibold px-2 py-1 text-white bg-violet-700 hover:bg-violet-500 rounded">Manage</button>
                                        </a>
                                    @endif
                                    @endif
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
                                    <p class="font-semibold capitalize">{{ $comment->user->name }}</p>
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


