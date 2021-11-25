@extends('layouts.admin')
@section('tag_select','menu-open')
@section('tag_active','active')
@section('tag_list_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tag List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tag List</li>
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
                <h3 class="card-title">Tag List</h3>
                <div class="card-tools">
                    <a href="{{route('admin.tag.create')}}" class="btn btn-primary">Create Tag</a>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($tags as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>
                            <form action="{{route('admin.tag.destroy',$item->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <a href="{{route('admin.tag.edit',$item->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                      @empty

                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
