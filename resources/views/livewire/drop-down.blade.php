<div>

    <div class="mb-4">
        <label class="text-gray-700 dark:text-gray-300" data-te-select-label-ref>Category One</label>
        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="adscategory_id" wire:model="selectedCategory" data-te-select-init>
            <option value="" selected> Choose One</option>
            @foreach ($adscategories as $adscategory)
            <option value="{{ $adscategory->id }}">{{ $adscategory->name }}</option>
            @endforeach
        </select>
    </div>

    @if (!is_null($selectedCategory))
    <div class="mb-4">
        <label class="text-gray-700 dark:text-gray-300" data-te-select-label-ref>Category Two</label>
        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="subcategory_id" wire:model="selectedSubcategory" data-te-select-init>
            <option value="" selected> Choose One</option>
            @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
    </div>
    @endif

    @if (!is_null($selectedSubcategory))
    <div class="mb-4">
        <label class="text-gray-700 dark:text-gray-300" data-te-select-label-ref>Category Three</label>
        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="childcategory_id"  data-te-select-init>
            <option value="" selected> Choose One</option>
            @foreach ($childcategories as $childcategory)
            <option value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
            @endforeach
        </select>
    </div>
     @endif

</div>
