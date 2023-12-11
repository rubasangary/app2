@extends('frontend.components.layouts')

@section('title', " Contact Us")

@section('content')

@include('toast.message')

<section class="lg:mt-10 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">

        <div class="mb-4">
            <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                <p class="text-base font-bold uppercase tracking-wide text-blue-600 dark:text-blue-200">
                    Contact Us
                </p>
                <h2 class="font-heading mt-6 mb-6 font-bold tracking-tight text-gray-600 dark:text-gray-300 text-xl sm:text-xl">
                    “Let’s build something great together.”
                </h2>
            </div>
        </div>

        <div class="flex items-stretch justify-center">
            <div class="grid md:grid-cols-2">
                <div class="h-full pr-6">
                    <p class="mt-3 mb-12 text-lg text-gray-600 dark:text-gray-400">
                        Welcome to Valarha conatact page Welcome to Valarha conatact pageWelcome to Valarha conatact pageWelcome to Valarha conatact pageWelcome to Valarha conatact page
                    </p>
                    <ul class="mb-6 md:mb-0">
                        <li class="flex">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <i class="fa-solid fa-at fa-lg"></i>
                            </div>
                            <div class="ml-4 mb-4">
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-gray-300">Email Us
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400">admin@valarha.com</p>
                                <p class="text-gray-600 dark:text-gray-400">valarha@gmail.com</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <i class="fa-brands fa-facebook-messenger fa-lg"></i>
                            </div>
                            <div class="ml-4 mb-4">
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-gray-300">Facebook Page</h3>
                                <p>Farm to Table</p>
                            </div>
                        </li>
                        <li class="flex mt-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-600 text-gray-50">
                                <i class="fa-brands fa-whatsapp fa-lg"></i>
                            </div>
                            <div class="ml-4 mb-4">
                                <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-gray-300">
                                    What's Up
                                </h3>
                                <p class="text-gray-600 dark:text-slate-400"></p>
                                <p class="text-gray-600 dark:text-slate-400"></p>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="card h-fit max-w-6xl p-5 md:p-12" id="form">
                    @auth
                    <h2 class="mb-4 text-xl font-bold text-gray-600 dark:text-gray-300">Ready to Get Started?</h2>

                        <form action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="mb-6">
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="name" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <input type="text" id="name" placeholder="{{ $user->name }}" class="mb-2 w-full rounded-md border border-gray-400 dark:border-gray-600 py-2 pl-2 pr-4 shadow-md dark:bg-gray-800 dark:text-gray-300 sm:mb-0 capitalize" name="{{ $user->name }}">
                                    </div>
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="email" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <input type="email" id="email" placeholder="{{ $user->email }}" class="mb-2 w-full rounded-md border border-gray-400 dark:border-gray-600 py-2 pl-2 pr-4 shadow-md dark:bg-gray-800 dark:text-gray-300 sm:mb-0" name="{{ $user->email }}">
                                    </div>
                                </div>

                                @error('message')
                                <span class="text-red-400"> {{ $message }}</span>
                                @enderror

                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="textarea" class="pb-1 text-xs uppercase tracking-wider"></label>
                                    <textarea name="message" cols="30" rows="5" placeholder="Write your message..." class="mb-2 w-full rounded-md border border-gray-400 dark:border-gray-600 py-2 pl-2 pr-4 shadow-md dark:bg-gray-800 dark:text-gray-300 sm:mb-0"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 font-xl rounded-md sm:mb-0">Send Message</button>
                            </div>
                        </form>
                    @else
                        <p class="mb-4 text-xl text-green-500">Please <a class="font-bold" href="{{ route('login') }}">login</a> before writing a message.</p>

                        <form id="contactForm">
                            <div class="mb-6">
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="name" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <input placeholder="name" class="mb-2 w-full rounded-md border border-gray-400 dark:border-gray-600 py-2 pl-2 pr-4 shadow-md dark:bg-gray-800 dark:text-gray-300 sm:mb-0" name="">
                                    </div>
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="email" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <input placeholder="email" class="mb-2 w-full rounded-md border border-gray-400 dark:border-gray-600 py-2 pl-2 pr-4 shadow-md dark:bg-gray-800 dark:text-gray-300 sm:mb-0" name="">
                                    </div>
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="textarea" class="pb-1 text-xs uppercase tracking-wider"></label>
                                    <textarea id="textarea" name="textarea" cols="30" rows="5" placeholder="Login please..." class="mb-2 w-full rounded-md border border-gray-400 dark:border-gray-600 py-2 pl-2 pr-4 shadow-md dark:bg-gray-800 dark:text-gray-300 sm:mb-0"></textarea>
                                </div>
                            </div>
                        </form>

                    @endauth
                </div>

            </div>
        </div>
    </div>
</section>




@endsection
