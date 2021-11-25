@extends('layouts.admin')
@section('user_select','menu-open')
@section('user_active','active')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/user')}}">User List</a></li>
            <li class="breadcrumb-item active">Edit User</li>
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
                <form action="{{route('admin.user.update',$user->id)}}" method="POST" autocomplete="off">@csrf
                    <input autocomplete="false"  type="text" style="display:none;">
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Eamil</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password (<span class="badge badge-info">if you want to change</span>)</label>
                      <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
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
