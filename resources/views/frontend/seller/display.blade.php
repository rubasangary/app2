@extends('user.components.layouts')

@section('content')



<!-- component -->
<div class="w-full">


</div>


    <div class="">

    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

                <!-- message -->
                @include('toast.message')
                <!-- message end-->

            <section class="container px-2 mx-auto">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">விற்பனை விளம்பரங்கள்</h2>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300">இங்கே உங்கள் விளம்பரங்களை கையாளவும்</p>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                #
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Image
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                price
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Status
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Edit
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                View
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Delete
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                                        @forelse ($ads as $key => $ad)



                                        <tr>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">{{ $key+1 }}</p>
                                                </div>
                                            </td>
                                            <td class="px-1 py-1 text-sm whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="{{ asset('/storage/ads/seller/' . $ad->feature_image) }}" class="object-cover w-8 h-8 rounded-full lg:w-20 lg:h-20 lg:mx-1 lg:rounded-md border-2 border-white dark:border-gray-700 shrink-0" alt="">
                                                    <img src="{{ asset('/storage/ads/seller/' . $ad->second_image) }}" class="object-cover w-8 h-8 rounded-full lg:w-20 lg:h-20 lg:mx-1 lg:rounded-md border-2 border-white dark:border-gray-700 shrink-0" alt="">
                                                    <img src="{{ asset('/storage/ads/seller/' . $ad->third_image) }}" class="object-cover w-8 h-8 rounded-full lg:w-20 lg:h-20 lg:mx-1 lg:rounded-md border-2 border-white dark:border-gray-700 shrink-0" alt="">
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">{{ $ad->name }}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">௹{{ $ad->price }}</p>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                @if ($ad->published == 1)
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    <h2 class="text-sm font-normal text-emerald-500">Published</h2>
                                                </div>
                                                @else
                                                <div class="inline-flex items-center rounded-full dark:bg-gray-800">
                                                    <h2 class="text-sm font-semibold text-red-500">Not Published</h2>
                                                </div>
                                                @endif
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <a href="{{ route('seller.edit', [$ad->id]) }}">
                                                    <button class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                        தொகு
                                                    </button>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <a href="{{ route('product.show', [$ad->id, $ad->slug]) }}">
                                                    <button class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-orange-600 rounded-lg hover:bg-orange-500 focus:outline-none focus:ring focus:ring-orange-300 focus:ring-opacity-80">
                                                        காட்டு
                                                    </button>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div x-data="{ isOpen: false }" x-cloak class="relative flex justify-center">
                                                    <button @click="isOpen = true" data-target="{{ $ad->id }}" class="px-6 py-2 mx-auto tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-80">
                                                       நீக்கு
                                                    </button>


                                                <div>

                                                    <div x-show="isOpen"
                                                        x-transition:enter="transition duration-400 ease-out"
                                                        x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
                                                        x-transition:leave="transition duration-350 ease-in"
                                                        x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
                                                        x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                                                        class="fixed inset-0 z-10 overflow-y-auto"
                                                        aria-labelledby="modal-title" role="dialog" aria-modal="true"
                                                    >
                                                        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                                            <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-900 border-2 dark:border-white sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                                                                <div>
                                                                    <div class="flex items-center justify-center p-3">
                                                                        <i class="fa-solid fa-circle-exclamation fa-2xl"></i>
                                                                    </div>

                                                                    <div class="mt-2 text-center">
                                                                        <h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title {{ $ad->id }}"> Are you sure ?</h3>
                                                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $ad->name }}
                                                                        </p>
                                                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                                                                            will be deleted permanently
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="mt-5 flex justify-center space-x-6">

                                                                    <form action="{{ route('ads.destroy', [$ad->id]) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <div>
                                                                        <button type="submit" class="px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform rounded-md sm:mt-0 sm:w-auto sm:mx-2 bg-red-700 hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-40">
                                                                        ஆம் நீக்கு
                                                                        </button>
                                                                    </div>
                                                                    </form>

                                                                    <div>
                                                                        <button @click="isOpen = false" class="px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:w-auto sm:mt-0 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                            வேணாம்
                                                                        </button>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td></tr>


                                        </tr>
                                        @empty
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <p class="text-gray-500 dark:text-gray-400"> No ads posted</p>
                                            </div>
                                        </td>
                                        @endforelse

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </section>


        </div>
    </div>



@endsection
