@if (session('message'))
<div x-data="{ isOpen: true }" x-show="isOpen" x-init="setTimeout(() => isOpen = false, 3000)" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <div>
        {{ session('message') }}
    </div>
</div>
@endif

