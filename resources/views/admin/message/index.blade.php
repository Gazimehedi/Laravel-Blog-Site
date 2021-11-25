@extends('layouts.admin')
@section('message_select','menu-open')
@section('message_active','active')
@section('message_list_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Message List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Message List</li>
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
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th width="14%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($messages as $key =>  $message)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->subject}}</td>
                        <td>
                            <form action="{{route('admin.message.destroy',$message->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <a href="{{route('admin.message.show',$message->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="6">Message not found</td>
                      </tr>
                      @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{$messages->links()}}
          </div>
      </div>
    </div>
  </div>
@endsection
