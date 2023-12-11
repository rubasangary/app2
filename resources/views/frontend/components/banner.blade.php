<div class="relative dark:bg-slate-900">

    @if ($user->setting->banner )
        <img class="h-24 md:h-48 shadow-lg w-full lg:rounded-lg object-cover" src="{{ asset('/storage/banners/' . $user->setting->banner )}}" alt="">
    @else
        <img class="h-24 md:h-48 shadow-lg w-full lg:rounded-lg object-cover" src="https://techmonitor.ai/wp-content/uploads/sites/4/2017/02/shutterstock_552493561.webp" alt="">
    @endif

    <div class="flex items-center absolute -translate-y-10 md:-translate-y-24 lg:-translate-y-20">
        <div class="">
                @if ($user->profile_photo_url)
                        <img src="{{ $user->profile_photo_url }}" class="w-24 h-24 md:w-36 md:h-36 rounded-full object-cover">
                @endif
        </div>
        <div>
            <p class="mt-6 lg:mt-12 ml-2 font-semibold text:md lg:text-2xl text-gray-600 dark:text-gray-400 capitalize">{{ $user->name }}</p>
        </div>
    </div>
</div>
