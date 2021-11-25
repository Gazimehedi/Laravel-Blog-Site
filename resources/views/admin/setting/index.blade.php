@extends('layouts.admin')
@section('setting_active','active')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Site Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-10 offset-md-1">
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
                <form action="{{route('site.setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
                    @method('PUT')
                    <input autocomplete="false"  type="text" style="display:none;">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                            <label for="name">Site Name</label>
                            <input type="text" class="form-control" name="site_name" id="name" placeholder="Enter user name" value="{{$setting->site_name}}" required>
                          </div>
                          <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$setting->email}}" required>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                              <label for="footer_info">Footer Text</label>
                              <input type="text" class="form-control" name="footer_info" id="footer_info" placeholder="Enter footer info" value="{{$setting->footer_info}}" >
                            </div>
                            <div class="col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" name="mobile" id="email" placeholder="Enter mobile" value="{{$setting->mobile}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <label for="name">Site Logo</label>
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img style="max-width: 100%;max-height:80px" src="{{asset($setting->logo)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                              <label for="fb_url">Facebook Url</label>
                              <input type="text" class="form-control" name="fb_url" id="fb_url" placeholder="Enter fb url" value="{{$setting->fb_url}}">
                            </div>
                            <div class="col-md-6">
                                <label for="tw_url">Twitter Url</label>
                                <input type="text" class="form-control" name="tw_url" id="tw_url" placeholder="Enter tw url" value="{{$setting->tw_url}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ig_url">Instagram Url</label>
                                <input type="text" class="form-control" name="ig_url" id="ig_url" placeholder="Enter ig url" value="{{$setting->ig_url}}">
                            </div>
                            <div class="col-md-6">
                                <label for="rh_url">RH Url</label>
                                <input type="text" class="form-control" name="rh_url" id="rh_url" placeholder="Enter rh url" value="{{$setting->rh_url}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <textarea rows="3" class="form-control" name="address" id="address" placeholder="address">{{$setting->address}}</textarea>
                      </div>
                    <div class="form-group">
                      <label for="description">Site About</label>
                      <textarea rows="4" class="form-control" name="description" id="description" placeholder="Enter description">{{$setting->description}}</textarea>
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
