@extends('user.components.layouts')

@section('content')


<h3 class="ml-5 text-blue-600 lg:text-xl font-semibold">வேலை விளம்பர படிவம்</h3>

<!-- message -->
@include('toast.errors')
<!-- message -->



<div>
    <div class="mt-6">
            <div class="mt-5">

                        <div class="p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
                            <h4 class="text-base lg:text-md text-gray-600 font-semibold mb-10 dark:text-gray-400">
                            பொறுத்தமானற்றை தேரிவு செய்க
                            </h4>

                            <form method="post" action="{{ url('user/add-job/store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-16">
                                    @livewire('jobs-category')
                                </div>

                                <div x-data="showImage()">
                                    <div>
                                        <p class="text-sm text-gray-700 mb-5 dark:text-gray-400">Logo பயன் படுத்துவதே சிறந்தது</p>
                                        <label class="text-gray-700 mb-3 dark:text-gray-300" for="feature_image">படம் or Logo - கட்டாயம் இல்லை / Optional</label>
                                        <input type="file" name="logo" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 dark:bg-gray-700" accept="image/*" @change="showPreview(event)" />
                                        <div class="relative flex flex-col items-center justify-center pt-7">
                                            <img id="logo" class="w-40">
                                        </div>
                                    </div>
                                </div>
                        </div>



                        <div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md mt-10 mb-10">
                            <h2 class="text-base lg:text-md text-gray-600 dark:text-gray-400 font-semibold mb-12 capitalize">தொழில் பற்றிய விபரம்</h2>
                            <div class="grid grid-cols-1">


                                    <!-- Select District -->
                                    @include('districts.districts-lanka')
                                    <!-- Select District -->


                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">தொழில் பெயர்/Job Title</label>
                                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-600 dark:bg-gray-900" name="name" value="{{ old('name') }}" type="text">
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">தொழில் பற்றிய விபரம்/Job Description</label>
                                    <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="description"  id="" cols="30" rows="3">{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">கல்வித் தகமை/Qualifications</label>
                                    <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="qualification"  id="" cols="30" rows="2">{{ old('qualification') }}</textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">வேறு தகமைகள்/Requirments</label>
                                    <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="requirement"  id="" cols="30" rows="2">{{ old('requirement') }}</textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">ஊழியம்/Salary</label>
                                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="salary" value="{{ old('salary') }}">
                                </div>

                            </div>

                        </div>



                    <div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md mb-10">
                            <h2 class="text-base lg:text-md mb-12 text-gray-600 dark:text-gray-400 font-semibold capitalize">நிறுவன விபரம் / Employer Details</h2>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">நிறுவனத்தின் பெயர்/Employer Name</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="company_name" value="{{ old('company_name') }}" type="text">
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">இடம்/Address</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="address" value="{{ old('address') }}" type="text">
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">Phone Number</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="phone" value="{{ old('phone') }}" type="number">
                            </div>

                            <div class="mb-6 w-full">
                                <label class="text-gray-700 dark:text-gray-300" for="">Display Your Email?</label>
                                <p class="text-blue-600">{{ auth()->user()->email }}</p>
                                <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="email_status" value="{{ old('email_status') }}" data-te-select-init>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>


                            <div class="p-6 rounded-md shadow-md mb-10 dark:bg-gray-800">

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-4">

                                    <div class="mt-8">
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-gray-200 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Post Now</button>
                                    </div>

                                </div>
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
                    var preview = document.getElementById("logo");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }

        }
    }
</script>


@endsection
