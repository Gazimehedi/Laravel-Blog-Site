@extends('layouts.admin')
@section('message_select','menu-open')
@section('message_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Message Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Message Details</li>
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
                <h3 class="card-title">Message Details</h3>
                <div class="card-tools">
                    <a href="{{route('admin.message.index')}}" class="btn btn-primary">Message List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-primary">
                  <tbody>
                      <tr>
                        <th width="40%">Name</th>
                        <td>{{$message->name}}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{$message->email}}</td>
                      </tr>
                      <tr>
                        <th>Message</th>
                        <td>{{$message->message}}</td>
                      </tr>
                      <tr>
                        <th>Created At</th>
                        <td>{{$message->created_at}}</td>
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
