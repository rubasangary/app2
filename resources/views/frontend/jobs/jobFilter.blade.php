@extends('frontend.components.layouts')

@section('content')


 <!--menu button -->
 <nav x-data="{ isOpen: false }" class="relative dark:bg-gray-900 z-10">
    <div @click.away="isOpen = false" class="container px-2 py-2 mx-auto lg:flex lg:justify-between lg:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-md text-gray-800 transition-colors duration-300 transform dark:text-gray-300 lg:text-md lg:font-semibold" href="#">
                    <i class="fa-solid fa-person-digging fa-lg mr-2" style="color: #0a8779;"></i>
                    <span>வேலை வாய்ப்பு</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button x-cloak @click="isOpen = true" type="button" class="text-gray-700 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                    <i x-show="!isOpen" class="fa-solid fa-bars fa-lg"></i>
                </button>

                <div  x-show="isOpen" >
                    <button x-cloak @click="isOpen = false">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100' : 'opacity-0 -translate-x-full']" class="absolute mt-6 inset-x-0 z-0 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-900 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 md:flex lg:items-center">
                <div>

                    @foreach ($jobMenu as $menu)
                    <div x-data="{ open: false }" class="relative lg:flex lg:space-x-2">


                        <button x-on:click="open = true"

                        class=" hover:bg-blue-700 lg:focus:ring-1 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-1 text-center inline-flex items-center lg:dark:hover:bg-blue-700 lg:dark:focus:ring-blue-800 text-sm text-gray-700 lg:font-semibold transition-colors duration-300 transform dark:text-gray-300 hover:text-white dark:hover:text-gray-300"
                            type="button">
                            <span class="mr-1"> {{ $menu->name}}</span>
                            <i class="fa-solid fa-sort-down mt-1" style="color: #7f7f7f;"></i>
                        </button>

                        <hr class="lg:hidden border-gray-200 dark:border-gray-800 mt-1">

                        <div class="lg:absolute lg:mt-20 mt-2 mb-2">
                            <ul
                                x-show="open"
                                x-on:click.away="open = false"
                                class="flex flex-col md:block lg:absolute right-0 px-4 py-2 rounded-md bg-blue-500 text-gray-100"
                                style="min-width:15rem">

                                @foreach ( $menu->JobSubcategory as $subMenu )

                                <a href="{{ route('job.filter', $menu->slug) }}" class="block rounded-md hover:bg-blue-600 whitespace-no-wrap py-1 px-4">
                                <li>
                                {{ $subMenu->name }}
                                </li>
                                </a>

                                @endforeach
                            </ul>
                        </div>

                            @endforeach

                    </div>

                </div>
            </div>
    </div>

</nav>
<!-- Mobile menu end -->


<main class="bg-gray-100 min-h-screen mt-4 dark:bg-gray-900 z-0 p-2 md:p-8">
    <div class="block md:container md:flex md:mx-auto">

        <!-- Main post section start -->
        <div class="w-full">

            <div  class="block lg:grid lg:grid-cols-2 mt-4">

                        @forelse ($jobsFilter as $job)

                            <div class="md:flex md:flex-col w-full md:w-10/12 p-6 md:mx-10 space-y-2 md:rounded-xl border border-black bg-gray-50 dark:bg-gray-800 md:shadow-lg mb-10">
                                <div class="text-sm font-thin text-green-700 dark:text-green-400">
                                    {{ $job->created_at->diffForHumans() }}
                                </div>
                                <div class="text-md font-semibold text-gray-700 dark:text-gray-300 capitalize">
                                    {{ $job->name }}
                                </div>
                                <div class="font-normal text-sm text-gray-700 dark:text-gray-300">
                                    {{ $job->description }}
                                </div>
                                <div class="py-2">
                                    <p class="text-xs dark:text-gray-300">Company/Employer Name:</p>
                                    <p class="font-bold text-md text-blue-500 capitalize py-2">{{ $job->company_name }}</p>
                                </div>

                                <div class="flex lg:items-center">
                                    <div>
                                        <p class="text-xs dark:text-gray-300">Job Posted By:</p>
                                        <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize">{{ $job->jobPostedBy->name }}</p>
                                    </div>
                                    <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $job->jobPostedBy->profile_photo_url }}">
                                </div>

                                <div class="flex justify-end">
                                    <a href="{{ route('job.show', $job->id) }}">
                                    <button type="button" class="bg-green-600 text-white px-3 py-1 rounded-md">Read more</button>
                                    </a>
                                </div>
                            </div>

                        @empty
                        <div>
                            Sorry! No jobs posted yet.
                        </div>

                        @endforelse


            </div>
        </div>
    </div>
</main>





@endsection
