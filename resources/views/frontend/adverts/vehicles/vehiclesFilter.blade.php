@extends('frontend.components.layouts')

@section('content')

<div>

        <!--menu button -->
        <nav x-data="{ isOpen: false }" class="relative dark:bg-gray-900 z-10">
            <div @click.away="isOpen = false" class="container px-2 py-2 mx-auto lg:flex lg:justify-between lg:items-center">
                <div class="flex items-center justify-between">
                    <div>
                        <a class="text-md text-gray-800 transition-colors duration-300 transform dark:text-gray-300 lg:text-md lg:font-semibold" href="#">
                            <i class="fa-solid fa-car mr-2" style="color: #fff700;"></i>
                            <span>வாகனங்கள்</span>
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

                            @foreach ($vehiclesMenus as $subMenu)
                            <div x-data="{ open: false }" class="relative lg:flex lg:space-x-2">


                                <button x-on:click="open = true"

                                class=" hover:bg-blue-700 lg:focus:ring-1 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-1 text-center inline-flex items-center lg:dark:hover:bg-blue-700 lg:dark:focus:ring-blue-800 text-sm text-gray-700 lg:font-semibold transition-colors duration-300 transform dark:text-gray-300 hover:text-white dark:hover:text-gray-300"
                                    type="button">
                                    <span class="mr-1"> {{ $subMenu->name}}</span>
                                    <i class="fa-solid fa-sort-down mt-1" style="color: #7f7f7f;"></i>
                                </button>

                                <hr class="lg:hidden border-gray-200 dark:border-gray-800 mt-1">

                                <div class="lg:absolute lg:mt-20 mt-2 mb-2">
                                    <ul
                                        x-show="open"
                                        x-on:click.away="open = false"
                                        class="flex flex-col md:block lg:absolute right-0 px-4 py-2 bg-blue-500 rounded-md text-gray-100"
                                        style="min-width:15rem">

                                        @foreach ( $subMenu->childcategory as $childMenu )

                                        <a href="{{ route('vehiclesFilter', $subMenu->slug) }}" class="block rounded-md hover:bg-blue-600 whitespace-no-wrap py-1 px-4">
                                        <li>
                                        {{ $childMenu->name }}
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

<h3 class="text-gray-600 dark:text-gray-200 text-2xl font-medium"></h3>


             <!-- Breadcrumbs -->

            <div class="mt-5">
                <div class="flex items-start space-x-1 text-gray-600 dark:text-gray-400 text-md">

                    <a href="/vehicles" class="hover:underline hover:text-gray-300 dark:text-gray-400">வாகனங்கள்</a>
                    <span>
                    <i class="fa-solid fa-chevron-right pb-2 pr-2" style="color: #0058f0;"></i>
                </span>

                        @for($i=2; $i<= count(Request::segments()); $i++)
                        @if($i<count(Request::segments()) & $i>0)
                            <a href="{{URL::to(implode('/',array_slice(Request::segments(), 0, $i, true)))}}">{{ucwords(Request::segment($i))}}
                            </a> <i class="fa-solid fa-chevron-right" style="color: #0058f0;"></i>
                        @else
                            {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                        @endif
                        @endfor

                </div>
            </div>

            <!-- Breadcrumbs ends -->

                <div>
                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-12">
                        <!--Card-->
                        @forelse ($vehiclesAdverts as $category )

                        <div class="rounded overflow-hidden shadow-lg dark:bg-gray-800">
                            <img class="w-full transform hover:scale-110 transition duration-500" src="{{ asset('/storage/ads/seller/' . $category->feature_image) }}" alt="Product-image">
                            <div class="px-4">
                                <div class="text-md mt-4 dark:text-gray-300">
                                    {{ $category->name }}
                                </div>
                                <p class="mb-4 mt-4 dark:taxt-gray-400">இடம்: <span class="text-blue-700 dark:text-blue-400"> {{ $category->location }}</span></p>
                                <p class="mb-4 dark:taxt-gray-400">விலை: <span class="text-green-700 dark:text-green-400">Rs {{ $category->price }}</span></p>
                            </div>
                            <div class="pl-5 pb-4">
                                <a href="{{ route('product.show', [$category->id, $category->slug]) }}" class="inline-flex items-center px-3 py-1 text-sm font-medium text-center text-white bg-blue-400 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    View Ad
                                    <i class="fa-solid fa-arrow-right pl-2"></i>
                                </a>
                                <p class="mt-3 font-normal text-gray-400">Posted: {{ $category->created_at->diffForHumans() }}</p>
                            </div>
                        </div>


                        @empty
                        <p class="text-xl justify-between dark:text-gray-300">
                            Sorry product not found
                        </p>
                        @endforelse


                    </div>
                </div>



</div>
@endsection
