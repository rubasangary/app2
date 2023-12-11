@extends('layouts.master')
@section('title', 'View Posts')

@section('content')

<div class="container-fluid px-4">

      <div class="card-header">
            <h4>View Posts
            <a href="{{ url('admin23/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
            </h4>
        </div>

        <div class="card-body">

            <div class="card">
                @if (session('message'))
                <div class="alert alert-success shadow">{{ session('message') }} </div>
                @endif

                <table id="myDataTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>

                    <tbody>
                        @foreach ($posts as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{ $item->category->name ?? ''}}</td>
                            <td>{{ $item->name }}</td>

                            <td>
                                <img src="{{ asset('storage/blogPost/'.$item->image)  }}" width="50px" height="50px" alt="" srcset="">
                            </td>

                            <td>{{ $item->status == '1' ? 'hidden' : 'visible'}}</td>

                            <td>
                                <a href="{{ url('admin23/post/'.$item->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin23/delete-post/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                         @endforeach
                    </tbody>

                </table>

        </div>

    </div>

</div>

@endsection
