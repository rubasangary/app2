@extends('user.components.layouts')

@section('content')

<div class="w-full">


</div>


    <div class="">

    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

            <!-- message -->
            @include('toast.message')
            <!-- message end-->


            <section class="container px-4 mx-auto">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Saved Advertisements</h2>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300">உங்கள் சேமிக்கப்பட்ட விளம்பரங்களை இங்கே கையாளவும்</p>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                #
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Price
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Remove
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                                        @forelse ($ads as $key => $ad)



                                        <tr>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">{{ $key+1 }}</p>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400"><a href="{{ route('product.show', [$ad->id, $ad->slug]) }}">{{ $ad->name }}</a></p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">௹{{ $ad->price }}</p>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div>
                                                    <form action="{{ route('ad.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="adId" value="{{ $ad->id }}">
                                                        <button type="submit">
                                                            Remove
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @empty
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <p class="text-gray-500 font-semibold dark:text-gray-400"> No saved ads to show</p>
                                            </div>
                                        </td>
                                        @endforelse

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </section>


        </div>
    </div>



@endsection
