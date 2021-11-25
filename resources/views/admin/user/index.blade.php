@extends('layouts.admin')
@section('user_select','menu-open')
@section('user_active','active')
@section('user_list_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">User List</li>
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
                <h3 class="card-title">User List</h3>
                <div class="card-tools">
                    <a href="{{route('admin.user.create')}}" class="btn btn-primary">Create User</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($users as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td><img src="{{asset($item->image)}}" style="width:80px;height:80px;" class="image rounded-circle"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <form action="{{route('admin.user.destroy',$item->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <a href="{{route('admin.user.edit',$item->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                      @empty

                      @endforelse
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
