<div>
    <div class="mb-6">
        <label data-te-select-label-ref>மாவட்டம்/District</label>
        <select class="w-full rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="district" data-te-select-init>
            <option value="" selected> Choose One</option>
            @foreach ($districts as $district)
            <option value="{{ $district->name }}">{{ $district->name }}</option>
            @endforeach
        </select>
    </div>
</div>
