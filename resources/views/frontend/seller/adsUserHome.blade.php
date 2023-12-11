@extends('frontend.components.layouts')

@section('content')

<h3 class="text-gray-600 dark:text-gray-200 text-2xl font-medium mt-3"></h3>


            <!-- seller bammer -->
            @include('frontend.components.banner')
            <!-- seller bammer -->



            <div class="translate-y-4">
                <div class="mt-16 lg:mt-24 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-12">
                    <!--Card-->
                    @forelse ($advertisements as $category )

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
                        </div>
                    </div>


                    @empty
                    <p class="text-xl justify-between dark:text-gray-300">
                        Sorry product not found
                    </p>
                    @endforelse


                </div>
            </div>

            <div class="font-blue-400 mt-10 mx-2 mb-2">
                {{ $advertisements->links() }}
            </div>



@endsection
