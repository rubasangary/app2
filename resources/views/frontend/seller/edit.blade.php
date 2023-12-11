@extends('user.components.layouts')

@section('content')


<h3 class="ml-5 text-blue-800 dark:text-blue-600 text-2xl font-semibold">Edit Product infomation</h3>

                <!-- message -->
                @include('toast.errors')
                <!-- message end-->


<div>
    <div class="mt-6">
        <div class="mt-4">


                    <div class="p-6 rounded-md shadow-md mb-10 dark:bg-gray-800">
                        <h2 class="text-lg text-gray-600 dark:text-gray-400 font-semibold mb-5 capitalize">பொருள் பற்றிய விபரம்</h2>

                        <div class="grid grid-cols-1 ">

                            <form method="post" action="{{ route('ads.update', $ad->id) }}" autocomplete="">
                                @csrf
                                @method('PUT')

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">குறுகிய விபரம்/Product Name</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-600 dark:bg-gray-900" name="name" value="{{ $ad->name }}" type="text">
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">விளக்கமான விபரம்/Product Info</label>
                                <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="description"  id="" cols="30" rows="10">{{ $ad->description }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">price (விலை)</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="price" value="{{ $ad->price }}" type="text">
                            </div>

                            <div class="mb-6 w-full">
                                <label class="text-gray-700 dark:text-gray-300" for="">price Satus</label>
                                <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="price_status" data-te-select-init>
                                    <option value="இறுதியானது" {{ $ad->price_status == "இறுதியானது"?'selected' : ''}}>இறுதியானது</option>
                                    <option value="குறைக்க வாய்ப்பு உண்டு" {{ $ad->price_status == "குறைக்க வாய்ப்பு உண்டு"?'selected' : ''}}>குறைக்க வாய்ப்பு உண்டு</option>
                                    <option value="பேசித் தீர்க்கலாம்" {{ $ad->price_status == "பேசித் தீர்க்கலாம்" ? 'selected' : ''}}>பேசித் தீர்க்கலாம்</option>
                                </select>
                            </div>

                            <div class="mb-6 w-full">
                                <label class="text-gray-700 dark:text-gray-300" for="">Product Condition</label>
                                <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="product_condition" data-te-select-init>
                                    <option value="படத்தில் உள்ளது போன்று" {{ $ad->product_condition == "படத்தில் உள்ளது போன்று"?'selected' : ''}}>படத்தில் உள்ளது போன்று</option>
                                    <option value="புதியது போன்று" {{ $ad->product_condition == "புதியது போன்று" ?'selected' : ''}}>புதியது போன்று</option>
                                    <option value="புதியது" {{ $ad->product_condition == "புதியது"?'selected' : ''}}>புதியது</option>
                                    <option value="பயன் படுத்தும் நிலையில்" {{ $ad->product_condition == "பயன் படுத்தும் நிலையில்"?'selected' : ''}}>பயன் படுத்தும் நிலையில்</option>
                                    <option value="திருத்தம் தேவை" {{ $ad->product_condition == "திருத்தம் தேவை"?'selected' : ''}}>திருத்தம் தேவை</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">Phone Number</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="phone" value="{{ $ad->phone }}" type="number">
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-gray-200 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Update Now</button>
                            </div>
                            </form>
                        </div>

                    </div>


            </div>
    </div>
</div>


@endsection

