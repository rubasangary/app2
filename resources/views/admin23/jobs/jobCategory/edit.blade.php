@extends('layouts.master')
@section('title', 'Adscategory')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">


            <h3>Edit Job Category</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{ url('admin23/update-jobscategory/'.$jobCategories->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $jobCategories->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

