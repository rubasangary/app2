@extends('layouts.master')
@section('title', 'Job Subcategory')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">


            <h3>Add Jobsubcategory</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{ url('admin23/add-jobsubcategory') }}" method="post" >
                                @csrf

                                <div class="form-group">
                                    <label for="name">Choose Category</label>
                                    <select name="jobscategory_id" class="form-control @error('jobscategory_id') is-invalid @enderror" id="">

                                        <option value="">Select from Category</option>
                                        @foreach ($jobcategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach
                                    </select>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Name of Subcategory">
                                    @error('name')
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
