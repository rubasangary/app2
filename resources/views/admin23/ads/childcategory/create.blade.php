@extends('layouts.master')
@section('title', 'Child Category')

@section('content')

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Add Childcategory
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="{{ url('admin23/add-childcategory') }}" method="post">
                    @csrf

                    <div class="mt-6">
                        <label for="name">Choose Category</label>
                        <select name="subcategory_id" class=" @error('adscategory_id') is-invalid @enderror" id="">

                            <option value="">Select category</option>
                            @foreach (App\Models\Subcategory::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="name of childcategory">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>

                            </span>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-semibold tracking-wider bg-blue-800 hover:bg-blue-600 rounded" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
