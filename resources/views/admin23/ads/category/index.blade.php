@extends('layouts.master')
@section('title', 'Ads category')

@section('content')


<div class="w-full mt-6">

    <div class="flex justify-between">
        <p class="text-xl pb-3 flex items-center text-gray-700 font-semibold">
            <i class="fas fa-list mr-3"></i> All Categories
        </p>
        <p>
            <a class="font-semibold text-sm bg-blue-700 hover:bg-blue-500 py-1 px-2 text-white rounded" href="{{ url('admin23/add-adscategory') }}">Add Category</a>
        </p>
    </div>


        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">


                    {{-- @if (session('message'))
                    <div class="alert alert-success shadow">{{ session('message') }} </div>
                    @endif --}}
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">

                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                    <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Category Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Image</th>>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Edit</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Delete</td>
                                </tr>
                            </thead>

                        </thead>

                    <tbody>
                        @foreach ($categories as $item )

                        <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">

                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$item->id}}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{$item->name}}</td>
                            <td class="whitespace-nowrap px-6 py-4"><img src="{{ asset('storage/ads/category/'.$item->image)  }}" width="50px" height="50px" alt="" srcset=""></td>
                            <td class="whitespace-nowrap px-6 py-4 "><a class="font-semibold text-sm bg-blue-700 hover:bg-blue-500 py-1 px-2 text-white rounded" href="{{ url('admin23/edit-adscategory/'.$item->id) }}" class="">Edit</a></td>
                            <td class="whitespace-nowrap px-6 py-4">{{-- <a href="{{ url('admin23/delete-adscategory/'.$item->id) }}" class="btn btn-danger">Delete</a> --}}</td>

                        </tr>

                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>

@endsection
