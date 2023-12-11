@extends('layouts.master')
@section('title', 'Edit Jobs Subcategory')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">


            <h3>Edit Job Subcategory</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{ url('admin23/update-jobsubcategory/'. $jobsubcategories->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $jobsubcategories->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="name">Choose category</label>

                                    <select class="form-control @error('jobscategory_id') is-invalid @enderror" name="jobscategory_id">
                                        <option value="">Select category</option>
                                        @foreach ( $jobcategories as $category )
                                            <option value="{{ $category->id }}" {{$jobsubcategories->jobscategory_id == $category->id ? 'selected':''}} >{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('adscategory_id')
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
