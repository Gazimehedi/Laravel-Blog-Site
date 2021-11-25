@extends('layouts.admin')
@section('post_select','menu-open')
@section('post_active','active')
@section('post_list_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Post List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Post List</li>
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
                        <h3 class="card-title">Post List</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Create
                                Post</a>
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
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th width="14%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $key =>  $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="80px" class="image-fluid">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            @foreach($item->tag as $tag)
                                                <p class="badge badge-primary">{{ $tag->name }}</p>
                                            @endforeach
                                        </td>
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
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
