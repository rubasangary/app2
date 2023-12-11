@extends('layouts.master')
@section('title', 'Ads Jobs Category')

@section('content')

<div class="container-fluid px-4">

    <div class="card-header">
        <h4>View Category
            <a href="{{ url('admin23/add-jobscategory') }}" class="btn btn-primary btn-sm float-end">Add Job Category</a>
        </h4>
    </div>

<div class="card-body">

    @if (session('message'))
    <div class="alert alert-success shadow">{{ session('message') }} </div>
    @endif


    <table id="myDataTable" class="table table-bordered shadow-sm rounded-md ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobCategories as $item)
            <tr>
                <td>{{  $item->id }}</td>
                <td>{{  $item->name }}</td>

                <td>
                <img src="{{ asset('storage/ads/category/'.$item->image)  }}" width="50px" height="50px" alt="" srcset="">
                </td>

                <td>
                   <a href="{{ url('admin23/edit-jobscategory/'.$item->id) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    {{-- <a href="{{ url('admin23/delete-adscategory/'.$item->id) }}" class="btn btn-danger">Delete</a> --}}
                 </td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>

@endsection
