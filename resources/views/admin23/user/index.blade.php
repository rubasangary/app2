@extends('layouts.master')
@section('title', 'View Users')

@section('content')


    <div class="w-full mt-6">
        <p class="text-xl pb-3 flex items-center text-gray-700 font-semibold">
            <i class="fas fa-list mr-3"></i> All Users
        </p>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                        <thead
                            class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                    <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Roll</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Edit</td>
                                </tr>
                            </thead>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $item )
                            <tr

                            class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$item->id}}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{$item->name}}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $item->email }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $item->role == '1' ? 'admin' : ($item->role == '2' ? 'blogger' : 'user') }}</td>

                            <td class="whitespace-nowrap px-6 py-4">
                                @if ($item->isBan == '0')
                                        <p class="text-green-500 font-semibold"> Active </p>
                                    @elseif ($item->isBan == '1')
                                        <p class="text-red-500 font-semibold"> Banned </p>
                                    @endif
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ url('admin23/user/'.$item->id) }}" class="btn btn-success">Edit</a>
                            </td>

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
