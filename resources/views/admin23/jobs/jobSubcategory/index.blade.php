@extends('layouts.master')
@section('title', 'Jobs Subcategory')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">


            <div class="card-header">
                <h4>Manage SubCategory
                <a href="{{ url('admin23/add-jobsubcategory') }}" class="btn btn-primary float-end">Add Subcategory</a>
                </h4>
            </div>

            <div class="row justify-content-center">


                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobsubcategories as $subcategory)
                                            <tr>
                                                <td class="categrory_{{ $subcategory->jobscategory_id }}">
                                                    {{ $subcategory->jobcategory->name}}</td>
                                                <td>{{ $subcategory->name}}</td>
                                                <td>
                                                    <a href="{{ url('admin23/edit-jobsubcategory/'.$subcategory->id) }}"><button
                                                            class="btn btn-info">
                                                            Edit
                                                        </button>
                                                    </a>

                                                </td>

                                            <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$subcategory->id}}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$subcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <form action="{{ url('admin23/delete-subcategory/'.$subcategory->id )}}" method="POST">
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
                td.categrory_1 {
                    background-color: aliceblue;
                }
                td.categrory_2 {
                    background-color:bisque;
                }
                td.categrory_3 {
                    background-color:thistle;
                }
                td.categrory_4 {
                    background-color:tomato;
                }
                td.categrory_5 {
                    background-color:rgb(255, 252, 225);
                }
                td.categrory_6 {
                    background-color:unset;
                }
                td.categrory_7 {
                    background-color:springgreen;
                }
                td.categrory_8 {
                    background-color:orchid;
                }
                td.categrory_9 {
                    background-color:pink;
                }


            </style>

        @endsection


