@extends('layouts.admin')
@section('profile_active','active')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset(Auth::user()->image)}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <div class="text-center">
                <p class="badge badge-primary">{{Auth::user()->role->position}}</p>
                <p class="text-muted text-center">{{Auth::user()->email}}</p>
              </div>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Posts</b> <a class="float-right">{{Auth::user()->post()->count()}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          @if (!empty(Auth::user()->description))
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Description</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <p class="text-muted">
                    {{Auth::user()->description}}
                </p>
                </div>
                <!-- /.card-body -->
            </div>
          @endif
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              <div class="tab-content">
                <div class="tab-pane active" id="settings">
                  <form class="form-horizontal" method="POST" action="{{route('admin.user.profileupdate',Auth::user()->id)}}" enctype="multipart/form-data" autocomplete="off">@csrf
                    @method('PUT')
                    <input type="hidden" autocomplete="false">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="name" name="name" class="form-control" id="inputName" placeholder="Name" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="inputName2" placeholder="username" value="{{Auth::user()->username}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" autocomplete="new-password">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-10 custom-file">
                            <input type="file" name="image" class="custom-file-input form-control" id="customFile">
                            <label style="right:8px;left:8px;" class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <textarea rows="5" class="form-control" name="description" id="inputExperience" placeholder="Description">{{Auth::user()->description}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
