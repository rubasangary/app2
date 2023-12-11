@extends('frontend.components.layouts')

@section('title', 'Buy and Sell in Sri Lanka')

@section('content')

         <!-- Breadcrumbs -->
         <div class="mt-5">
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
    <!-- message -->

<div class="mt-5 lg:mt-20">

  <div class="max-w-7xl mx-auto px-4 lg:px-8 lg:mt-2">
        <div class="flex flex-col md:flex-row -mx-8">
                <div class="md:flex-1 px-5">
                        <div x-data="{ image: 1 }" x-cloak>
                                    <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                                            <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 dark:bg-gray-800 mb-4 flex items-center justify-center">
                                            <span><img src="{{ asset('/storage/ads/seller/' . $productPage->feature_image) ?? '' }}"></span>
                                            </div>

                                            <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 dark:bg-gray-800 mb-4 flex items-center justify-center">
                                            <span><img src="{{ asset('/storage/ads/seller/' . $productPage->second_image) ?? '' }}"></span>
                                            </div>

                                            <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 dark:bg-gray-800 mb-4 flex items-center justify-center">
                                            <span><img src="{{ asset('/storage/ads/seller/' . $productPage->third_image) ?? '' }}"></span>
                                            </div>
                                    </div>

                                    <div>
                                        <div class="flex lg:mt-20 gap-5">
                                            <button x-on:click="image = 1" :class="{ 'ring-1 ring-gray-400 ring-inset': image === 1 }" class="focus:outline-none w-full rounded bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                            <span><img src="{{ asset('/storage/ads/seller/' . $productPage->feature_image) ?? '' }}"></span>
                                            </button>
                                            <button x-on:click="image = 2" :class="{ 'ring-1 ring-gray-400 ring-inset': image === 2 }" class="focus:outline-none w-full rounded bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                            <span><img src="{{ asset('/storage/ads/seller/' . $productPage->second_image) ?? ''}}"></span>
                                            </button>
                                            <button x-on:click="image = 3" :class="{ 'ring-1 ring-gray-400 ring-inset': image === 3 }" class="focus:outline-none w-full rounded bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                            <span><img src="{{ asset('/storage/ads/seller/' . $productPage->third_image) ?? '' }}"></span>
                                            </button>
                                        </div>
                                    </div>

                        </div>


                        <div class="mt-12">
                            <div class="mr-2">
                                @if ($productPage->link)
                                {!! $productPage->displayVideoFromLink() !!}
                                @endif
                            </div>
                        </div>

                    </div>




                <div class="md:flex-1 px-6 lg:rounded-md lg:shadow-lg">

                            <h2 class="mb-2 lg:mt-2 leading-tight tracking-tight font-semibold text-gray-600 dark:text-gray-400 text-xl">{{ $productPage->name }}</h2>
                            <p class="text-gray-500 text-md py-2">Posted: <a href="#" class="text-blue-600 hover:underline">{{ $productPage->created_at->diffForHumans() }}</a></p>

                            <div class="flex items-center md:space-x-4 py-2">
                                <div>
                                    <div class="rounded-lg bg-gray-200 flex py-1 px-1">
                                    <span class="text-blue-600 mr-1 mt-1">Rs</span>
                                    <span class="font-bold text-blue-600 text-xl">{{ $productPage->price }}</span>
                                    </div>
                                </div>
                                <div class="flex-1 px-3">
                                    <p class="text-green-500 text-lg font-semibold">விலை</p>
                                    <p class="text-gray-400 text-sm">{{ $productPage->price_status }}</p>
                                </div>
                            </div>

                        <p class="text-gray-600 dark:text-gray-400 text-md py-8">{{ $productPage->description }}</p>

                        <p class="text-gray-600 dark:text-gray-400 text-md py-2">Product Condition:	{{ $productPage->product_condition	 }}</p>

                        <p class="text-gray-500 dark:text-gray-400 text-md">மாவட்டம்: <a href="#" class="text-blue-600">{{ $productPage->district}}</a></p>
                        <p class="text-gray-500 dark:text-gray-400 text-md">இடம்: <a href="#" class="text-blue-600">{{ $productPage->location}}</a></p>

                        <!-- vue components starts here -->
                        <div id="app">

                            @if (Auth::check())
                            @if (!$productPage->didUserSavedAd() && auth()->user()->id != $productPage->user_id)

                                            <div id="Savingads" class="mt-2">
                                                <Savingads
                                                :ad-id="{{ $productPage->id }}"
                                                :user-id="{{ auth()->user()->id }}"
                                                />
                                            </div>
                            @endif
                            @endif

                            <hr class="mt-6 lg:w-2/3 border-gray-800">

                            <div class="w-full mt-6 max-w-sm">

                                    <div class="flex flex-col items-center pb-10">

                                        <p class="text-gray-500 text-md mb-3">Posted By: <a href="{{ route('user.showProduct', [$productPage->adPostedBy->slug]) }}" class="text-blue-600 hover:underline dark:text-white capitalize">{{ $productPage->adPostedBy->name }}</a></p>

                                        <a href="{{ route('user.showProduct', [$productPage->adPostedBy->slug]) }}">
                                        <img  class="w-36 h-28 mb-3 rounded-md shadow-lg" src="{{ $productPage->adPostedBy->profile_photo_url }}"  alt="Avatar"/>
                                        </a>


                                        <div class="flex mt-4 space-x-3 md:mt-6">

                                                @if (auth()->check())
                                                @if (auth()->user()->id != $productPage->user_id)

                                                <div id="Message">
                                                        <Message seller-name="{{ $productPage->adPostedBy->name }}"

                                                            :user-id={{ auth()->user()->id}}
                                                            :receiver-id={{ $productPage->user_id}}
                                                            :ad-id={{ $productPage->id}}
                                                            />
                                                </div>
                                                @endif
                                                @endif

                                                <div>
                                                    <p id="Phone">
                                                        @if ($productPage->phone)
                                                        <Phone :phone-number="{{ $productPage->phone }}"/>
                                                        @endif
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                </div>
                <!-- vue components ends here -->

        </div>
</div>
</div>

        <!--Report spam model -->
        <div>

             <div class="px-4 py-4 text-sm whitespace-nowrap">
                    <div x-data="{ isOpen: false }" class="relative flex justify-center">


                            @if (Auth::check())
                            @if (!$productPage->didUserComplained() && auth()->user()->id != $productPage->user_id)
                                <button @click="isOpen = true" data-target="" class="mb-10 text-red-400 text-base decoration-solid underline">
                                    Report This Advertisement !
                                </button>
                            @endif
                            @endif


                        <div>

                            <form action="{{ route('report.ad') }}" method="post">
                                @csrf
                                    <div x-show="isOpen"
                                        x-transition:enter="transition duration-300 ease-out"
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

                                                        <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-900 border-2 dark:border-gray-600 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                                                            <div>
                                                                <div class="mt-2 text-center">
                                                                    <h3 class="text-lg font-medium leading-6 text-gray-500 dark:text-gray-400" id="modal-title ">Report what is wrong with this ad</h3>
                                                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                                        உங்களின் முறைப்பாடு என்ன?
                                                                    </p>
                                                                </div>
                                                            </div>


                                                            <div class="mt-2">
                                                                <label class="block mb-1" for="">Select Reason</label>
                                                                <select class="dark:bg-gray-900 rounded-sm w-full" name="reason" required>
                                                                    <option value="">Select</option>
                                                                    <option value="scam">நம்பிக்கை அற்றதாக தெரிகிறது</option>
                                                                    <option value="scam2">அணுகுமுறை சரியில்லை</option>
                                                                    <option value="scam3">ஏமாற்றப் பட்டேன்</option>
                                                                    <option value="scam4">வேறு காரணம்</option>
                                                                </select>
                                                            </div>

                                                            <div class="mt-2">
                                                                    <label class="block mb-1" for="">Email</label>
                                                                    @if (Auth::check())
                                                                    <input class="w-full dark:bg-gray-900" type="email" name="email" value="{{ Auth::user()->email }}" readonly>
                                                                    @else
                                                                    <input class="w-full dark:bg-gray-900" type="email" name="email" required>
                                                                    @endif
                                                            </div>

                                                            <div class="mt-2">
                                                                <label class="block mb-1" for="">Message</label>
                                                                <textarea class="w-full dark:bg-gray-900" name="message" required></textarea>
                                                            </div>

                                                                    <div><input type="hidden" name="ad_id" value="{{ $productPage->id }}"></div>

                                                                    <div class="mt-5 flex justify-center space-x-6">
                                                                        <div>
                                                                            <button @click="isOpen = false" class="px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:w-auto sm:mt-0 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                                Close
                                                                            </button>
                                                                        </div>

                                                                        <div>
                                                                            <button type="submit" class="px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-600 rounded-md sm:w-auto sm:mt-0 hover:bg-green-500 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-40">
                                                                                Send Now
                                                                            </button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                        </div>
                                                    </div>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <!--Report spam model end-->


</div>

@endsection

