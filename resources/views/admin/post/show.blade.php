@extends('layouts.admin')
@section('post_select','menu-open')
@section('post_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Post Details</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header vertical-align-middle">
                <h3 class="card-title">Post Details</h3>
                <div class="card-tools">
                    <a href="{{route('admin.post.index')}}" class="btn btn-primary">Post List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-primary">
                  <tbody>
                      <tr>
                        <th width="300px">Post Image</th>
                        <td><img src="{{asset($post->image)}}" style="max-width: 300px;max-height:300px"  class="image-fluid"></td>
                      </tr>
                      <tr>
                        <th>Post Title</th>
                        <td>{{$post->title}}</td>
                      </tr>
                      <tr>
                        <th>Post Slug</th>
                        <td>{{$post->slug}}</td>
                      </tr>
                      <tr>
                        <th>Post Category</th>
                        <td>{{$post->category->name}}</td>
                      </tr>
                      <tr>
                        <th>Post Author</th>
                        <td>{{$post->user->name}}</td>
                      </tr>
                      <tr>
                        <th>Post TAgs</th>
                        <td>
                            @foreach ($post->tag as $tag)
                            <p class="badge badge-primary">{{$tag->name}}</p>
                            @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th>Post Description</th>
                        <td>{!!$post->description!!}</td>
                      </tr>
                      <tr>
                        <th>Published At</th>
                        <td>{{$post->published_at}}</td>
                      </tr>
                      <tr>
                        <th>Created At</th>
                        <td>{{$post->created_at}}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
