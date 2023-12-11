@extends('user.components.layouts')

@section('content')

        <div>
            <!-- seller bammer -->
            @if (optional($user->setting)->banner)
                <img class="h-24 md:h-48 shadow-lg w-full lg:rounded-lg object-cover" src="{{ asset('/storage/banners/' . $user->setting->banner )}}" alt="">
            @else
                <img class="h-24 md:h-48 shadow-lg w-full lg:rounded-lg object-cover" src="https://techmonitor.ai/wp-content/uploads/sites/4/2017/02/shutterstock_552493561.webp" alt="">
            @endif
            <!-- seller bammer -->
        </div>

        <!-- Setting Button -->
        <div class="mt-4 lg:mt-6  justify-self-end">
            <a href="{{ route('edit-settings') }}">
                <i class="fa-solid fa-gear lg:fa-xl" style="color: #005eff;"></i><span class="p-2 text-md font-semibold items-end">Settings</span>
            </a>
        </div>
        <!-- Setting Button -->


        <div>
            @include('toast.message')
        </div>



        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-20 mt-5 lg:mt-10">
            <div class="w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 bg-white lg:rounded-lg shadow-lg h-full dark:bg-gray-900 md:p-4">
                <div class="">

                </div>
                <!-- Profile Card -->
                <div class="dark:bg-gray-900 p-2 lg:rounded-lg">

                    <div class="photo-wrapper p-2">
                        @if ($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" class="w-32 h-32 rounded-full mx-auto object-cover">
                        @endif
                    </div>

                    <div class="p-2">
                        <h3 class="text-center text-xl text-gray-900 dark:text-gray-300 font-medium leading-8 capitalize">{{ $user->name }}</h3>
                    </div>

                    <div class="py-10 text-center">

                        <!-- facebook -->
                        @if (optional($user->setting)->facebook)
                            <a href="{{ $user->setting->facebook }}"><i class="fa-brands fa-square-facebook fa-2xl p-4" style="color: #1f66e0;"></i></i></a>
                        @else
                            <i class="fa-brands fa-square-facebook fa-2xl p-4" style="color: #1f66e05d;"></i>
                        @endif

                        <!-- youtube -->
                        @if (optional($user->setting)->youtube)
                            <a href="{{ $user->setting->youtube }}"><i class="fa-brands fa-youtube fa-2xl p-4" style="color: #eb4040;"></i></a>
                        @else
                            <i class="fa-brands fa-youtube fa-2xl p-4" style="color: #eb404071;"></i>
                        @endif

                        <!-- instagram -->
                        @if (optional($user->setting)->instagram )
                            <a href="{{ $user->setting->instagram  }}"><i class="fa-brands fa-instagram fa-2xl p-4" style="color: #f0246b;"></i></a>
                        @else
                            <i class="fa-brands fa-instagram fa-2xl p-4" style="color: #f0246b6c;"></i>
                        @endif

                        <!-- pinterest -->
                        @if (optional($user->setting)->pinterest)
                            <a href="{{ $user->setting->pinterest }}"><i class="fa-brands fa-pinterest fa-2xl p-4" style="color: rgb(230, 65, 65);"></i></a>
                        @else
                            <i class="fa-brands fa-pinterest fa-2xl p-4" style="color: rgba(230, 65, 65, 0.445);"></i>
                        @endif

                    </div>
                </div>
                <!-- Profile Card -->
            </div>


            <!-- table -->
            <div class="w-full lg:w-w-1/2 xl:w-1/2 2xl:w-1/2 bg-white lg:rounded-lg shadow-lg h-full dark:bg-gray-900 md:p-4">


                <!-- Fullname -->
                <div class="flex">
                    <div class="w-24 p-4">
                        <div class="text-sm font-semibold">Name: </div>
                    </div>
                    <div class="p-4 lg:ml-8 text-sm capitalize">
                        @if (optional($user->setting)->fullname)
                            {{ $user->setting->fullname }}
                        @else
                            <p class="text-gray-500">Not Available</p>
                        @endif
                    </div>
                </div>

                <!-- About -->
                <div class="flex">
                    <div class="w-24 p-4">
                        <div class="text-sm font-semibold">About: </div>
                    </div>
                    <div class="p-4 lg:ml-12 text-sm">
                        @if (optional($user->setting)->about)
                            {{ $user->setting->about }}
                        @else
                            <p class="text-gray-500">Not Available</p>
                        @endif
                    </div>
                </div>

                <!-- Website -->
                <div class="flex">
                    <div class="w-24 p-4">
                        <div class="text-sm font-semibold">Website: </div>
                    </div>
                    <div class="p-4 lg:ml-8 text-sm">
                        @if (optional($user->setting)->website)
                            {{ $user->setting->website }}
                        @else
                            <p class="text-gray-500">Not Available</p>
                        @endif
                    </div>
                </div>

                <!-- Address -->
                <div class="flex">
                    <div class="w-24 p-4">
                        <div class="text-sm font-semibold">Address: </div>
                    </div>
                    <div class="p-4 lg:ml-8 text-sm capitalize">
                        @if (optional($user->setting)->address)
                            {{ $user->setting->address }}
                        @else
                            <p class="text-gray-500">Not Available</p>
                        @endif
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex">
                    <div class="w-24 p-4">
                        <div class="text-sm font-semibold">Phone: </div>
                    </div>
                    <div class="p-4 lg:ml-8 text-sm">
                        @if (optional($user->setting)->phone)
                            {{ $user->setting->phone }}
                        @else
                            <p class="text-gray-500">Not Available</p>
                        @endif
                    </div>
                </div>

                <!-- Mobile -->
                <div class="flex">
                    <div class="w-24 p-4">
                        <div class="text-sm font-semibold">Mobile: </div>
                    </div>
                    <div class="p-4 lg:ml-8 text-sm">
                        @if (optional($user->setting)->mobile)
                            {{ $user->setting->mobile }}
                        @else
                            <p class="text-gray-500">Not Available</p>
                        @endif
                    </div>
                </div>

            </div>
            <!-- table -->

        </div>


@endsection
