@extends('layouts.master')
@section('title', 'View Users')

@section('content')

<div class="w-full lg:w-6/12">
    <div>

        <!-- component -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-2">


            <div class="-mx-3 md:flex mb-6 items-center justify-between">
                <div class="">
                    <h4 class="text-2xl font-semibold"> Edit user </h4>
                </div>

                <div>
                        <button class="bg-blue-800 hover:bg-blue-600 px-2 rounded">
                            <a href="{{ url('admin23/users') }}" class="text-xl font-semibold text-white p-2">Back</a>
                        </button>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <p class="text-lg capitalize">Name: {{ $user->name }}</p>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="mb-3">
                    <p  class="text-lg capitalize">Email: {{ $user->email }}</p>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div>
                    @if ($user->isBan == '0')
                    <p class="text-lg text-green-500">The current user is Active </p>
                    @elseif ($user->isBan == '1')
                    <p class="text-red-500">The current user is Banned </p>
                    @endif
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="mb-3">
                    <p  class="text-lg">Created at: {{ $user->created_at->format('d/m/y')}}</p>
                </div>
            </div>



            <div>

                <form action="{{ url('admin23/update-user/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mt-5">
                        <label>Role As</label>
                        <select name="role" class="">
                            <option value="">-- Select User Type --</option>
                            <option value="0" {{ $user->role == '0' ? 'selected' : ''}}>User</option>
                            <option value="2" {{ $user->role == '2' ? 'selected' : ''}}>Blogger</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <label>User Status</label>
                        <select name="isBan" class="">
                            <option value="">-- Ban or Unban --</option>
                            <option value="0" {{ $user->isBan == '0' ? 'selected' : ''}}>Activate</option>
                            <option value="1" {{ $user->isBan == '1' ? 'selected' : ''}}>Ban Now</option>
                        </select>
                    </div>

                        <div class="mt-10">
                            <button type="submit" class="text-xl font-semibold text-white bg-blue-800 hover:bg-blue-600 p-2 rounded">Update Post</button>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection


