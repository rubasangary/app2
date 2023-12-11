<div class="relative dark:bg-slate-900">

    <a href="{{ route('showUploadForm') }}">
        <img class="h-24 md:h-48 shadow-lg w-full rounded-lg" src="{{ asset('/storage/banners/' . $user->setting->banner )}}" alt="">
    </a>

    <div class="flex items-center absolute -translate-y-10 lg:-translate-y-16">
        <div class="">
            <a href="{{ url('user/profile') }}">
                @if ($user->profile_photo_url)
                        <img src="{{ $user->profile_photo_url }}" class="w-24 h-24 md:w-36 md:h-36 rounded-full">
                @endif
            </a>
        </div>
        <div>
            <p class="mt-6 lg:mt-8 ml-2 font-bold text:md lg:text-2xl text-gray-600 dark:text-gray-400 capitalize">{{ $user->name }} - </p>
        </div>
    </div>
</div>
