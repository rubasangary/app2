@extends('frontend.components.layouts')

@section('title', 'ஊர் புதினம்')
@section('content')

         <!-- seller bammer -->
         @include('frontend.components.banner')
         <!-- seller bammer -->


        <div class="mt-20 lg:mt-24 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">


                {{--left column start --}}
                <div class="w-full lg:w-1/2 xl:w-2/3 2xl:w-3/4 rounded-lg h-full bg-white dark:bg-gray-800">



                        {{-- Card start --}}
                        @foreach ($forum as $item)
                        <div class="block rounded-lg mb-4 border border-gray-300 bg-transparent dark:border-gray-700 dark:bg-gray-800 bg-white">

                            <div class="border-b-2 relative border-gray-300 px-6 py-1 text-gray-700 dark:border-gray-700 dark:text-gray-300 flex justify-between">

                                    <div class="flex">

                                        @if ($item->forumPostedBy->profile_photo_url)
                                            <img class="h-10 w-10 rounded-full mr-3" src="{{ $item->forumPostedBy->profile_photo_url }}">
                                        @else
                                            <img src="/img/man.jpg" width="120">
                                        @endif
                                        <p class="font-semibold capitalize mt-3">{{ $item->forumPostedBy->name }}</p>

                                    </div>

                                <div>
                                    <div class="mt-3">
                                        {{ $item->created_at->diffForHumans()  }}
                                    </div>
                                </div>
                            </div>

                            {{-- body start --}}
                            <div class="p-6">
                                <p class="text-base pl-10 lg:pl-16 text-gray-600 dark:text-gray-300">
                                    {{ $item->content }}
                                </p>
                            </div>
                            {{-- body end --}}

                            <div class="border-t-2 border-gray-300 px-6 py-3 text-gray-700 dark:border-gray-700 dark:text-gray-300 flex justify-between">

                                <div>
                                    Footer
                                </div>
                                <div>
                                    <a href="{{ route('forum.show', $item->id) }}">
                                        <button class="text-sm font-semibold px-2 py-1 text-white bg-violet-700 hover:bg-violet-500 rounded">View</button>
                                    </a>
                                </div>
                            </div>

                        </div>

                            @endforeach
                            {{-- Card end --}}

                            <div class="mt-6 mb-4">
                                {{ $forum->links() }}
                            </div>

                </div>
                {{--left column end --}}

                <div class="w-full lg:w-1/2 xl:w-1/3 2xl:w-1/4 bg-white rounded-lg h-full dark:bg-gray-800">


                        <div class="p-3">
                            sidebar
                        </div>
                </div>

        </div>

        <!-- end::Messages -->

@endsection

