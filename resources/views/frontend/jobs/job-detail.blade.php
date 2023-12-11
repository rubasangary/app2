@extends('frontend.components.layouts')

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



<div class="flex item-center justify-center mt-8 lg:mt-20 lg:mb-20">
    <div class="bg-gray-50 dark:bg-gray-800 max-w-3xl shadow-lg overflow-hidden sm:rounded-lg">

        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-700 dark:text-gray-300">
                Job full Details
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-600 dark:text-gray-300">
                வேலை பற்றிய முழு விபரம்
            </p>

            <div class="flex lg:items-center py-2">
                <div>
                    <p class="text-xs dark:text-gray-300">Job Posted By:</p>
                    <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize">{{ $job->jobPostedBy->name }}</p>
                </div>
                <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $job->jobPostedBy->profile_photo_url }}">
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Posted: {{ $job->created_at->diffForHumans() }}</p>
        </div>


        <div class="border-t border-gray-500">
            <div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800 mt-4">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Job Title <br>
                        வேலை பெயர்:
                    </div>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        {{ $job->name }}
                    </div>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Work Description<br>
                        வேலை விபரம்:
                    </div>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        {{ $job->description }}
                    </div>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Qualification<br>
                        கல்வித் தகுதி:
                    </div>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        {{ $job->qualification }}
                    </div>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Other Requiarements<br>
                        வேறு தகுதிகள்:
                    </div>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        {{ $job->requirement }}
                    </div>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Salary<br>
                        ஊழியம்:
                    </div>
                    <div class="mt-1 font-semibold text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        Rs {{ $job->salary }}
                    </div>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Phone<br>
                        தொலை பேசி:
                    </div>
                    <div class="mt-1 font-semibold text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        {{ $job->phone }}
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Email address
                    </div>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300 sm:mt-0 sm:col-span-2">
                        @if ($job->email_status == 0)
                        Not Available
                        @elseif ($job->email_status == 1)
                        {{ $job->jobPostedBy->email }}
                        @endif
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        About
                    </div>
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-300  sm:mt-0 sm:col-span-2">
                        To get social media testimonials like these, keep your customers engaged with your social media accounts by posting regularly yourself
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
