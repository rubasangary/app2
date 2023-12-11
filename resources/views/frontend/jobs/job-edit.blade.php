@extends('user.components.layouts')

@section('content')


<h3 class="ml-5 text-blue-600 lg:text-xl font-semibold">Edit and Update</h3>

<!-- message -->
@include('toast.errors')
<!-- message -->



<div>
    <div class="mt-6">
            <div class="mt-5">

                            <form method="post" action="{{ route('jobs.update', $ad->id) }}" autocomplete="">
                                @csrf
                                @method('PUT')




                        <div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md mt-10 mb-10">
                            <h2 class="text-base lg:text-md text-gray-600 dark:text-gray-400 font-semibold mb-12 capitalize">தொழில் பற்றிய விபரம்</h2>
                            <div class="grid grid-cols-1">

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">தொழில் பெயர்/Job Title</label>
                                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-600 dark:bg-gray-900" name="name" value="{{ $ad->name }}" type="text">
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">தொழில் பற்றிய விபரம்/Job Description</label>
                                    <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="description"  id="" cols="30" rows="3">{{ $ad->description }}</textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">கல்வித் தகமை/Qualifications</label>
                                    <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="qualification"  id="" cols="30" rows="2">{{ $ad->qualification }}</textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">வேறு தகமைகள்/Requirments</label>
                                    <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="requirement"  id="" cols="30" rows="2">{{ $ad->requirement }}</textarea>
                                </div>

                                <div class="mb-6">
                                    <label class="text-gray-700 dark:text-gray-300" for="">ஊழியம்/Salary</label>
                                    <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="salary" value="{{ $ad->salary }}">
                                </div>

                            </div>

                        </div>



                    <div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md mb-10">
                            <h2 class="text-base lg:text-md mb-12 text-gray-600 dark:text-gray-400 font-semibold capitalize">நிறுவன விபரம் / Employer Details</h2>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">நிறுவனத்தின் பெயர்/Employer Name</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="company_name" value="{{ $ad->company_name }}" type="text">
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">இடம்/Address</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="address" value="{{ $ad->address }}" type="text">
                            </div>

                            <div class="mb-6">
                                <label class="text-gray-700 dark:text-gray-300" for="">Phone Number</label>
                                <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="phone" value="{{ $ad->phone }}" type="number">
                            </div>

                            <div class="mb-6 w-full">
                                <label class="text-gray-700 dark:text-gray-300" for="">Display Your Email?</label>
                                <p class="text-blue-600">{{ auth()->user()->email }}</p>
                                <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="email_status" value="" data-te-select-init>
                                    <option value="1" {{ $ad->email_status == '1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ $ad->email_status == '0' ? 'selected' : ''}}>No</option>
                                </select>
                            </div>


                            <div class="p-6 rounded-md shadow-md mb-10 dark:bg-gray-800">

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-4">

                                    <div class="mt-8">
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-gray-200 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Update Now</button>
                                    </div>

                                </div>
                            </div>


                    <div>
                    </form>
                </div>
        </div>

</div>


@endsection
