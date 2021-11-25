@extends('layouts.admin')
@section('dashboard_active','active')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$postcount}}</h3>

                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen-square"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$catcount}}</h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$tagcount}}</h3>

                        <p>Tags</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$usercount}}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header vertical-align-middle">
                        <h3 class="card-title">Post List</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.post.index') }}" class="btn btn-primary">Post list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th width="20%">Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th width="14%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $key =>  $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="80px" class="image-fluid img-thumbnail rounded">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            <form
                                                action="{{ route('admin.post.destroy',$item->id) }}"
                                                method="POST">@csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.post.show',$item->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.post.edit',$item->id) }}"
                                                    class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Post not found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
