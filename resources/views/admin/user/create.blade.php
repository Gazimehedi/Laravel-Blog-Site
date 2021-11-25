@extends('layouts.admin')
@section('user_select','menu-open')
@section('user_active','active')
@section('user_create_active','active')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/user')}}">User List</a></li>
            <li class="breadcrumb-item active">Create User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6 offset-md-3">
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
                <form action="{{route('admin.user.store')}}" method="POST" autocomplete="off">@csrf
                    <input autocomplete="false"  type="text" style="display:none;">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter user name" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter user email">
                    </div>
                    <div class="form-group">
                      <label for="name">Passowrd</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Enter user password" autocomplete="new-password">
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
@endsection
