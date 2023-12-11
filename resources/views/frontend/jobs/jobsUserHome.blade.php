@extends('frontend.components.layouts')

@section('content')

<h3 class="text-gray-600 dark:text-gray-200 text-2xl font-medium mt-3"></h3>


            <!-- seller bammer -->
            @include('frontend.components.banner')
            <!-- seller bammer -->



            <!-- Main post section start -->
        <div class="w-full">

            <div  class="block lg:grid lg:grid-cols-2 mt-4">

                        @forelse ($jobs as $job)

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
                                    <a href="{{ route('user.showProduct', $job->jobPostedBy->slug) }}">
                                        <div>
                                            <p class="text-xs dark:text-gray-300">Job Posted By:</p>
                                            <p class="dark:text-gray-300 leading-none pb-1 text-xs lg:font-semibold capitalize">{{ $job->jobPostedBy->name }}</p>
                                        </div>
                                        <img class="w-8 h-8 rounded-full ml-4 lg:ml-6" src="{{ $job->jobPostedBy->profile_photo_url }}">
                                    </a>
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

            <div class="font-blue-400 mt-10 mx-2 mb-2">
                {{ $jobs->links() }}
            </div>



@endsection

