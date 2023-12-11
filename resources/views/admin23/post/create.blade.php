@extends('layouts.master')
@section('title', 'Add Posts')

@section('content')

<div class="container-fluid px-4">


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h4>Add Posts
            <a href="{{ url('admin23/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
            </h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ url('admin23/add-post') }}" enctype="multipart/form-data" >
                @csrf

                <div class="mb-3">
                    <label>Category</label>
                    <select name="category_id" required class="form-control">
                        <option>-- Select Category --</option>
                        @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote" rows="4" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">meta_title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                </div>

                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Post</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>

</div>

@endsection
