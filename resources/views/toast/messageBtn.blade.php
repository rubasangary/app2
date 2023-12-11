@if (session('message'))
<div x-data="{ isOpen: true }" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert" x-show="isOpen">
    <div>
        {{ session('message') }}
    </div>
    <button type="button" aria-label="Close" @click="isOpen = false">
        <span class="hover:text-red-900 items-end" aria-hidden="true">
            &cross;
        </span>
    </button>
</div>
@endif
