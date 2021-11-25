@extends('layouts.admin')
@section('post_select','menu-open')
@section('post_active','active')
@section('post_create_active','active')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/post')}}">Post List</a></li>
            <li class="breadcrumb-item active">Create Post</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-10 offset-md-1">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card card-primary">
                <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">@csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Enter post title" required>
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category" id="category" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label>
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="customFile" >
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tags</label><br>
                        @foreach ($tags as $tag)
                        <div class="form-check d-inline-block">
                            <input class="form-check-input" id="tag{{$tag->id}}" name="tag[]" value="{{$tag->id}}" type="checkbox">
                            <label class="form-check-label" for="tag{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea rows="4" class="form-control" name="description" id="description" placeholder="Enter post description" required>{{old('description')}}</textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
          </div>
      </div>
    </div>
  </div>
  @section('style')
  <link rel="stylesheet" href="{{asset('assets')}}/summernote-bs4.min.css">
  @endsection
  @section('script')
  <script src="{{asset('assets')}}/summernote-bs4.min.js"></script>
  <script>
    $('#description').summernote({
      placeholder: 'Enter post description',
      tabsize: 2,
      height: 200
    });
  </script>
  @endsection
@endsection
