@extends('user.components.layouts')

@section('content')

<div class="fade">

    <div class="flex flex-col">

            <h4 class="font-semibold mt-4 mb-6 text-gray-700 dark:text-gray-300"><i class="fa-solid fa-drum fa-lg mr-3" style="color: #0a5ae6;"></i><span>ஊர் புதினம்</span></h4>

            <p>You Have Total: {{ $forum->count() }}</p>

        @include('toast.message')


        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">


                {{--left column start --}}
                <div class="w-full lg:w-1/2 xl:w-2/3 2xl:w-3/4 rounded-lg h-full">

                        <form class="mb-6" action="{{ route('forum.store') }}" method="POST">
                            @csrf
                            <textarea class="w-full text-gray-700 dark:border-gray-700 dark:text-gray-300 p-2 bg-white dark:bg-gray-800" name="content" id="" cols="" rows="" placeholder="   என்ன புதினம்?"></textarea>
                            <button type="submit" class="px-2 mt-2 font-semibold text-white bg-violet-700 hover:bg-violet-500 rounded"><i class="fa-solid fa-share fa-sm mr-2"></i>Share</button>

                            @error('content')
                            <span class="text-red-400"> {{ $message }}</span>
                            @enderror
                        </form>


                        {{-- Card start --}}
                        @foreach ($forum as $item)
                        <div class="block rounded-lg border border-gray-300 bg-transparent dark:border-gray-700 dark:bg-gray-800 mt-4 bg-white">

                            <div class="border-b-2 relative border-gray-300 px-6 py-3 text-gray-700 dark:border-gray-700 dark:text-gray-300 flex justify-between">
                                <div>
                                    <p class="font-semibold capitalize">{{ $item->forumPostedBy->name }}</p>
                                </div>

                                <div x-data="{open:false}" @click.away="open = false">
                                    <div class="">
                                        <a @click="open=!open"><i class="fa-solid fa-ellipsis fa-lg" style="color: #7f8794;"></i></a>
                                    </div>
                                    <div x-show="open" class="absolute right-0">
                                        <a  class="px-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-blue-700 hover:bg-blue-500 transition-500"
                                         href="{{ route('forum.edit', $item->id) }}">
                                            Edit
                                        </a>
                                            <form action="{{ route('forum.user.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button  class="px-2 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-blue-700 hover:bg-blue-500 transition-500" href="{{ $item->id }}">
                                                    Delete
                                                </button>
                                            </form>
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
                                    <a href="{{ route('forum.userShow', $item->id) }}">
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




    </div>



</div>
@endsection
