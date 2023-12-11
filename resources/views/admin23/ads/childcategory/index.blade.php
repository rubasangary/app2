@extends('layouts.master')
@section('title', 'Child Category')

@section('content')
    {{-- <div class="main-panel">
        <div class="content-wrapper">

            @include('backend.inc.message')

            <h4>Manage ChildCategory</h4>
            <div class="row justify-content-center">


                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subcategory</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($childcategories as $childcategory)
                                            <tr>
                                            <td class="adscategory_{{$childcategory->subcategory_id}}">{{$childcategory->subcategory->name}}</td>
                                                <td>{{ $childcategory->name }}</td>
                                                <td>
                                                    <a href="{{ url('admin23/edit-childcategory/'.$childcategory->id) }}"><button
                                                            class="btn btn-sm btn-info">
                                                            Edit
                                                        </button>
                                                    </a>

                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$childcategory->id}}">
                                                        Delete
                                                    </button>

                                                    <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$childcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                            <form action="{{ url('admin23/delete-childcategory/'.$childcategory->id )}}" method="POST">
                                                @csrf

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                                    </div>
                                                </div>
                                            </form>

                                            </div>
                                        </div>

                                        </td>

                                    </tr>

                                        @empty
                                            <td>No childcategory to display</td>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}





            <div class="flex justify-between">
                <p class="text-xl pb-3 flex items-center text-gray-700 font-semibold">
                    <i class="fas fa-list mr-3"></i> All Subcategories
                </p>
                <p>
                    <a class="font-semibold text-sm bg-blue-700 hover:bg-blue-500 py-1 px-2 text-white rounded" href="{{ url('admin23/add-subcategory') }}">Add Subcategory</a>
                </p>
            </div>


        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">

                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">

                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Subcategory</th>
                                    <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Edit</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Delete</th>
                                </tr>
                            </thead>

                        </thead>

                    <tbody>
                        @forelse ($childcategories as $item )

                        <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">

                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$item->subcategory->name}}</td>
                            <td class="whitespace-nowrap px-6 py-4 adscategory_{{$item->adscategory_id}}">{{$item->name}}</td>
                            <td class="whitespace-nowrap px-6 py-4 "><a class="font-semibold text-sm bg-blue-700 hover:bg-blue-500 py-1 px-2 text-white rounded" href="{{ url('admin23/edit-childcategory/'.$item->id) }}" class="">Edit</a></td>
                            <td>

                                <div x-data="{ modalOpen: false }"
                                    @keydown.escape.window="modalOpen = false"
                                    :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                                    <button @click="modalOpen=true" class="inline-flex items-center justify-center px-2 py-1 font-semibold rounded transition-colors bg-red-700 hover:bg-red-500  disabled:opacity-50 disabled:pointer-events-none text-white">Delete</button>
                                    <template x-teleport="body">
                                        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                                            <div x-show="modalOpen"
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in duration-300"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
                                            <div x-show="modalOpen"
                                                x-trap.inert.noscroll="modalOpen"
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave="ease-in duration-200"
                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                                                class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
                                                <div class="flex items-center justify-between pb-3">
                                                    <h3 class="text-lg font-semibold">Modal Title</h3>
                                                    <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                                    </button>
                                                </div>
                                                <div class="relative w-auto pb-8">
                                                    <p>This is placeholder text. Replace it with your own content.</p>
                                                </div>
                                                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                    <button @click="modalOpen=false" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Cancel</button>
                                                    <button @click="modalOpen=false" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                            </td>

                        </tr>

                        @empty
                            <td>No subcategory to display</td>
                        @endforelse
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>


            <style>

                td.adscategory_5 {
                    background-color:rgb(249, 210, 210);
                }
                td.adscategory_7 {
                    background-color:rgb(187, 253, 220);
                }
                td.adscategory_8 {
                    background-color:hsl(302, 59%, 65%);
                }
                td.adscategory_9 {
                    background-color:hsl(350, 100%, 88%);
                }
                td.adscategory_10 {
                    background-color: hsl(66, 74%, 90%);
                }
                td.adscategory_11 {
                    background-color:hsl(33, 100%, 88%);
                }
                td.adscategory_18 {
                    background-color:rgb(250, 163, 148);
                }

            </style>

        @endsection
