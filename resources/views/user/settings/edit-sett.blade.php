@extends('user.components.layouts')

@section('content')

        <div>
            <!-- seller banner -->
            @if (optional($user->setting)->banner)
                <a href="{{ route('showUploadForm') }}">
                    <img class="h-24 md:h-48 shadow-lg w-full lg:rounded-lg object-cover" src="{{ asset('/storage/banners/' . $user->setting->banner )}}" alt="">
                </a>
            @else
                <a href="{{ route('showUploadForm') }}">
                    <img class="h-24 md:h-48 shadow-lg w-full lg:rounded-lg object-cover" src="https://techmonitor.ai/wp-content/uploads/sites/4/2017/02/shutterstock_552493561.webp" alt="">
                </a>
            @endif
            <!-- seller banner -->
        </div>

        <!-- Setting Button -->
        <div class="mt-4 lg:mt-6 justify-self-end">
            <a href="{{ route('settings') }}">
                <i class="fa-solid fa-arrow-left fa-lg" style="color: #145fe1;"></i><span class="p-2 text-md font-semibold items-end">Go Back</span>
            </a>
        </div>
        <!-- Setting Button -->




        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-20 mt-5 lg:mt-10">
            <div class="w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 bg-white lg:rounded-lg shadow-lg h-full dark:bg-gray-900 md:p-8">
                <div class="dark:bg-gray-900 p-2 lg:rounded-lg">

                    <div class="photo-wrapper p-2">
                        <a href="{{ url('user/profile') }}">
                            @if ($user->profile_photo_url)
                                    <img src="{{ $user->profile_photo_url }}" class="w-32 h-32 rounded-full mx-auto object-cover">
                            @endif
                        </a>
                    </div>
                    <div class="p-2">
                        <h3 class="text-center text-xl text-gray-900 dark:text-gray-300 font-medium leading-8">{{ $user->name }}</h3>
                    </div>


                    <div class="lg:p-4">
                        <div class="text-md font-semibold text-center">Social Links:</div>
                    </div>

                        <form action="">
                            <div class="mb-4">
                                <label for="facebook" class="block text-sm text-gray-600 dark:text-gray-400 py-2">
                                    <i class="fa-brands fa-square-facebook fa-2xl pr-2" style="color: #1f66e0;"></i>
                                    Facebook:
                                </label>
                                <input id="facebook" name="facebook" type="url" class="bg-gray-50 dark:bg-gray-800 w-full" placeholder="https://facebook.com">
                            </div>
                            <div class="mb-4">
                                <label for="youtube" class="block text-sm text-gray-600 dark:text-gray-400 py-2">
                                    <i class="fa-brands fa-youtube fa-2xl pr-2" style="color: #fc3333;"></i>
                                    YouTube:
                                </label>
                                <input id="youtube" name="youtube" type="url" class="bg-gray-50 dark:bg-gray-800 w-full" placeholder="https://youtube.com">
                            </div>
                            <div class="mb-4">
                                <label for="instagram" class="block text-sm text-gray-600 dark:text-gray-400 py-2">
                                    <i class="fa-brands fa-instagram fa-2xl pr-2" style="color: #f0246b;"></i>
                                    Instagram:
                                </label>
                                <input id="instagram" name="instagram" type="url" class="bg-gray-50 dark:bg-gray-800 w-full" placeholder="https://instagram.com">
                            </div>
                            <div class="mb-4">
                                <label for="pinterest" class="block text-sm text-gray-600 dark:text-gray-400 py-2">
                                    <i class="fa-brands fa-pinterest fa-2xl pr-2" style="color: #f33a3a;"></i>
                                    Pinterest:
                                </label>
                                <input id="pinterest" name="pinterest" type="url" class="bg-gray-50 dark:bg-gray-800 w-full" placeholder="https://pinterest.com">
                            </div>
                        </form>
                </div>
            </div>

            <div class="w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 bg-white lg:rounded-lg shadow-lg h-full dark:bg-gray-900 md:p-8">
                <div class="dark:bg-gray-900 p-2 lg:rounded-lg">
                    <div class="lg:p-4">
                        <div class="text-md font-semibold text-center">Bussiess Info:</div>
                    </div>


                    <form action="">

                            <div class="w-full py-3">
                                <label for="">About:</label>
                                <textarea class="bg-gray-50 dark:bg-gray-800 w-full" name="" id="" cols="30" rows="5"></textarea>
                            </div>

                            <div class="w-full py-3">
                                <label for="">Website/Blog:</label>
                                <input class="bg-gray-50 dark:bg-gray-800 w-full" type="url" name="website" pattern="https?://.+">
                                <small class="text-green-500">e.g., https://example.com/blog</small>
                            </div>

                            <div class="w-full py-3">
                                <label for="">Address:</label>
                                <input class="bg-gray-50 dark:bg-gray-800 w-full" type="url" name="website" pattern="https?://.+">
                            </div>

                            <div class="w-full py-3">
                                <label for="">Phone:</label>
                                <input class="bg-gray-50 dark:bg-gray-800 w-full" type="tel" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number">
                            </div>

                            <div class="w-full py-3">
                                <label for="">Mobile:</label>
                                <input class="bg-gray-50 dark:bg-gray-800 w-full" type="tel" pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number">
                            </div>

                    </form>
                </div>
            </div>
        </div>


@endsection
