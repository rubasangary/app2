@if ($errors->any())
<div x-data="{ isOpen: true }" class="text-sm text-left border flex items-start justify-between px-4 py-3 mt-5 rounded-sm text-red-600 bg-red-200 border-red-400 " role="alert" x-show="isOpen">
    <div>
        <strong class="mr-1"></strong>
        @foreach ($errors->all() as $errorMessage)
            <li>{{ $errorMessage }}</li>
        @endforeach
    </div>
    <button type="button" aria-label="Close" @click="isOpen = false">
        <span class="hover:text-red-900" aria-hidden="true">
            &cross;
        </span>
    </button>
</div>
@endif
