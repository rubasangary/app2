<div>

    <div class="mb-10">
        <label class="text-gray-700 dark:text-gray-300" data-te-select-label-ref>Category</label>
        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="job_category_id" wire:model="selectedjobCategory" data-te-select-init>
            <option value="" selected>-- Choose One --</option>
            @foreach ($jobcategories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- @if (!is_null($selectedjobCategory)) --}}
    <div class="mb-10">
        <label class="text-gray-700 dark:text-gray-300" data-te-select-label-ref>Subcategory</label>
        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="job_subcategory_id" wire:model="" data-te-select-init>
            <option value="" selected> -- Choose One --</option>
            @foreach ($jobsubcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
    </div>
    {{-- @endif --}}

</div>

