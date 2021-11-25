@extends('layouts.admin')
@section('category_select','menu-open')
@section('category_active','active')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/category')}}">Category List</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-8 offset-md-2">
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
                <form action="{{route('admin.category.update',$category->id)}}" method="POST">@csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea rows="4" class="form-control" name="description" id="description" required>{{$category->description}}</textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
