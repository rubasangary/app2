@extends('user.components.layouts')

@section('content')


<h3 class="ml-5 text-blue-600 lg:text-xl font-semibold">விற்பனை விளம்பர படிவம்</h3>

             <!-- message -->
             @include('toast.errors')
             <!-- message end-->

<div>
    <div class="mt-6">
        <div class="mt-4">

                <div class="p-6 bg-white rounded-md shadow-md mb-10 dark:bg-gray-800">
                    <h4 class="text-md  text-gray-600 font-semibold mb-5 dark:text-gray-400">
                       பொறுத்தமானற்றை தேரிவு செய்க!
                    </h4>

                    <form method="post" action="{{ url('user/ads/store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-10">
                            @livewire('drop-down')
                        </div>
                </div>



                <div class="p-6 rounded-md shadow-md mb-10 dark:bg-gray-800">
                    <h2 class="text-lg text-gray-600 dark:text-gray-400 font-semibold mb-5 capitalize">பொருள் பற்றிய விபரம்</h2>
                    <div class="grid grid-cols-1 ">


                    <div class="mb-6">
                        <label class="text-gray-700 dark:text-gray-300" for="">குறுகிய விபரம்</label>
                        <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-600 dark:bg-gray-900" name="name" value="{{ old('name') }}" type="text">
                    </div>

                    <div class="mb-6">
                        <label class="text-gray-700 dark:text-gray-300" for="">விளக்கமான விபரம்</label>
                        <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="description"  id="" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="text-gray-700 dark:text-gray-300" for="">price (விலை)</label>
                        <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="price" value="{{ old('price') }}" type="text">
                    </div>

                    <div class="mb-6 w-full">
                        <label class="text-gray-700 dark:text-gray-300" for="">price Satus</label>
                        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="price_status" data-te-select-init>
                            <option value="இறுதியானது">இறுதியானது</option>
                            <option value="குறைக்க வாய்ப்பு உண்டு">குறைக்க வாய்ப்பு உண்டு</option>
                            <option value="பேசித் தீர்க்கலாம்">பேசித் தீர்க்கலாம்</option>
                          </select>
                    </div>

                    <div class="mb-6 w-full">
                        <label class="text-gray-700 dark:text-gray-300" for="">Product Condition</label>
                        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="product_condition" data-te-select-init>
                            <option value="படத்தில் உள்ளது போன்று">படத்தில் உள்ளது போன்று</option>
                            <option value="புதியது போன்று">புதியது போன்று</option>
                            <option value="புதியது">புதியது</option>
                            <option value="பயன் படுத்தும் நிலையில்">பயன் படுத்தும் நிலையில்</option>
                            <option value="திருத்தம் தேவை">திருத்தம் தேவை</option>
                          </select>
                    </div>
                  </div>

                </div>


            <div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md mb-10">
                    <h2 class="text-lg mb-5 text-gray-600 dark:text-gray-300 font-semibold capitalize">Seller Details</h2>


                        <!-- Select District -->
                        @include('districts.districts-lanka')
                        <!-- Select District -->


                <div class="mb-6">
                    <label class="text-gray-700 dark:text-gray-300" for="">இடம்/வீதி/நகரம்</label>
                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="location" value="{{ old('location') }}" type="text">
                </div>


                <div class="mb-6">
                    <label class="text-gray-700 dark:text-gray-300" for="">Phone Number</label>
                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="phone" value="{{ old('phone') }}" type="number">
                </div>
                <div class="mb-6">
                    <label class="text-gray-700 dark:text-gray-300" for="">Youtube Video Link</label>
                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="link" value="{{ old('link') }}" type="text">
                </div>


                <div class="p-6 rounded-md shadow-md mb-10 dark:bg-gray-800">
                    <h6 class="text-md text-gray-700 font-semibold capitalize mb-5 dark:text-gray-400">
                        மூன்று படங்களை பதிவேற்ற முடியும்
                    </h6>
                   <p class="text-sm text-gray-700 mb-5 dark:text-gray-400">வேலை வாய்ப்பாயின் logo பயன் படுத்துவதே சிறந்தது</p>


                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-4">

                    <div x-data="showImage()">
                        <div>
                            <label class="text-gray-700 mb-3 dark:text-gray-300" for="feature_image">படம்-1 or Logo கட்டாயமானது</label>
                            <input type="file" name="feature_image" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 dark:bg-gray-700" accept="image/*" @change="showPreview(event)" />
                            <div class="relative flex flex-col items-center justify-center pt-7">
                                <img id="feature_image" class="w-40">
                            </div>
                        </div>
                    </div>



                    <div x-data="showImage2()">
                        <div>
                            <label class="text-gray-700 mb-3 dark:text-gray-300" for="second_image">படம்-2 கட்டாயமற்றது</label>
                            <input type="file" name="second_image"  class="form-input w-full mt-2 rounded-md focus:border-indigo-600 dark:bg-gray-700" accept="image/*" @change="showPreview2(event)" />
                            <div class="relative flex flex-col items-center justify-center pt-7">
                                <img id="second_image" class="w-40">
                            </div>
                        </div>
                    </div>


                    <div x-data="showImage3()">
                        <div>
                            <label class="text-gray-700 mb-3 dark:text-gray-300" for="third_image">படம்-3 கட்டாயமற்றது</label>
                            <input type="file" name="third_image" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 dark:bg-gray-700" accept="image/*" @change="showPreview3(event)" />
                            <div class="relative flex flex-col items-center justify-center pt-7">
                                <img id="third_image" class="w-40">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-gray-200 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Publish Now</button>
                </div>
                <div>
            </form>
        </div>
    </div>
</div>

@livewireScripts

<script>
    function showImage() {
        return {
            showPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("feature_image");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }

        }
    }

    function showImage2() {
        return {
            showPreview2(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("second_image");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }

        }
    }

    function showImage3() {
        return {
            showPreview3(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("third_image");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }

        }
    }
</script>


@endsection

