﻿@extends('layouts.layout')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
            @foreach ($postFirst2 as $post)
            <a href="{{route('post',$post->slug)}}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{asset($post->image)}}');">

                <div class="text">
                    <h2>{{$post->title}}</h2>
                    <span class="date">{{$post->created_at->format('M d, Y')}}</span>
                </div>
                </a>
                @endforeach
        </div>
        <div class="col-md-4">
        @foreach ($postMiddle as $post)
          <a href="{{route('post',$post->slug)}}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{asset($post->image)}}');">

            <div class="text">
              <div class="post-categories mb-3">
                <span class="post-category bg-danger">{{$post->category->name}}</span>
              </div>
              <h2>{{$post->title}}</h2>
              <span class="date">{{$post->created_at->format('M d, Y')}}</span>
            </div>
          </a>
          @endforeach
        </div>
        <div class="col-md-4">
            @foreach ($postLast2 as $post)
            <a href="{{route('post',$post->slug)}}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{asset($post->image)}}');">

              <div class="text">
                <h2>{{$post->title}}</h2>
                <span class="date">{{$post->created_at->format('M d, Y')}}</span>
              </div>
            </a>
            @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($recent_posts as $recent_post)
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="{{route('post',$recent_post->slug)}}"><img src="{{asset($recent_post->image)}}" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{$recent_post->category->name}}</span>

            <h2><a href="{{route('post',$recent_post->slug)}}">{{$recent_post->title}}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">{{$recent_post->user->name}}</a></span>
              <span>&nbsp;-&nbsp; {{$recent_post->published_at->format('M d, Y')}}</span>
            </div>

              <p>{!! Str::limit($recent_post->description, 200) !!}</p>
              <p><a href="{{route('post',$recent_post->slug)}}">Read More</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row text-center pt-5 border-top">
        <div class="col-md-12">
            {{$recent_posts->links()}}
          <div class="custom-pagination">

            {{-- <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">

        <div class="col-md-5 order-md-2">
        @foreach ($footerLast as $post)
          <a href="{{route('post',$post->slug)}}" class="hentry img-1 h-100 gradient" style="background-image: url('{{asset($post->image)}}');">
            <span class="post-category text-white bg-danger">{{$post->category->name}}</span>
            <div class="text">
              <h2>{{$post->title}}</h2>
              <span>{{$post->created_at->format('M d, Y')}}</span>
            </div>
          </a>
          @endforeach
        </div>

        <div class="col-md-7">
        @foreach ($footerFirst as $post)
          <a href="{{route('post',$post->slug)}}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{asset($post->image)}}');">
            <span class="post-category text-white bg-success">{{$post->category->name}}</span>
            <div class="text text-sm">
              <h2>{{$post->title}}</h2>
              <span>{{$post->created_at->format('M d, Y')}}</span>
            </div>
          </a>
        @endforeach
          <div class="two-col d-md-flex d-flex justify-content-between">
            @foreach ($footerMiddle2 as $post)
            <a href="{{route('post',$post->slug)}}" class="hentry v-height img-2 gradient" style="background-image: url('{{asset($post->image)}}');">
              <span class="post-category text-white bg-primary">{{$post->category->name}}</span>
              <div class="text text-sm">
                <h2>{{$post->title}}</h2>
                <span>{{$post->created_at->format('M d, Y')}}</span>
              </div>
            </a>
            @endforeach

          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="#" class="d-flex">
              <input type="text" class="form-control" placeholder="Enter your email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
