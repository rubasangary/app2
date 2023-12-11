@extends('user.components.layouts')

@section('content')


<h3 class="ml-2 lg:mt-8 text-blue-800 dark:text-blue-600 text-2xl font-semibold">Write Post</h3>

<!-- message -->
@include('toast.errors')
<!-- message end-->

<div>
    <div class="mt-6">
        <div class="mt-4">

        <form method="POST" action="{{ url('blog/write-post') }}" enctype="multipart/form-data">
            @csrf

                <div class="p-6 rounded-md shadow-md mb-10 bg-white dark:bg-gray-800">
                    <div class="grid grid-cols-1 ">

                    <div class="mb-6 w-full">
                        <label class="text-gray-700 dark:text-gray-300" for="">Category</label>
                        <select class="w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="category_id" data-te-select-init>
                            <option disabled hidden selected>-- Select Category --</option>
                            @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                            @endforeach
                        </select>
                    </div>

                        <br>

                        <div class="mb-6">
                            <label class="text-gray-700 dark:text-gray-300" for="">Heading</label>
                            <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-600 dark:bg-gray-900" name="title" value="{{ old('title') }}" type="text">
                        </div>

                        <div class="mb-6">
                            <label class="text-gray-700 dark:text-gray-300" for="">Content</label>
                            <textarea class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="content"  id="" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>

                  </div>

                </div>


            <div class="p-6 bg-white dark:bg-gray-800 rounded-md shadow-md mb-10">

                    <div class="mb-6">
                        <label class="text-gray-700 dark:text-gray-300" for="">Youtube Video Link (URL)</label>
                        <input class="form-input w-full mt-2 rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="yt_iframe" value="{{ old('yt_iframe') }}" type="url">
                    </div>

                    <div x-data="showImage()">
                        <div>
                            <label class="text-gray-700 mb-3 dark:text-gray-300" for="image">Image or Thumbnail of video</label>
                            <input type="file" name="image" class="form-input w-full mt-2 rounded-md focus:border-indigo-600 dark:bg-gray-700" accept="image/*" @change="showPreview(event)" />
                            <div class="relative flex flex-col items-center justify-center pt-7">
                                <img id="feature_image" class="w-40">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-gray-200 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Publish Now</button>
                    </div>
            </div>


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

</script>


@endsection

