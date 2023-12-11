@extends('layouts.master')
@section('title', 'Ads category')

@section('content')

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Edit Subcategory
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="{{ url('admin23/update-subcategory/'. $subcategory->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mt-6">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" value="{{$subcategory->name}}" type="text" required="" placeholder="Your Name" aria-label="Name">
                    </div>

                    <div class="mt-6">
                        <label for="name">Choose Category</label>
                        <select name="adscategory_id">

                            <option value="">Select category</option>
                            @foreach (App\Models\Adscategory::all() as $adscategory)
                                <option value="{{ $adscategory->id }}" {{$subcategory->adscategory_id == $adscategory->id ? 'selected':''}} >{{ $adscategory->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-semibold tracking-wider bg-blue-800 hover:bg-blue-600 rounded" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
