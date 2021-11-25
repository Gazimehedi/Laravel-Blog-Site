<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">

          <div style="margin-bottom:0px;" class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn mr-4" type="submit"><span class="icon-search"></span></button>
              <button style="font-size: 18px;font-weight:bold" type="button" class="search-btn"><span class="js-search-close">&#9747;</span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
              @if (isset($setting->logo))
              <a href="{{url('/')}}" class="text-black h2 mb-0"><img src="{{asset($setting->logo)}}" alt="{{$setting->site_name}}" style="max-height: 70px;"></a>
              @else
                <h3>{{$setting->site_name}}</h3>
              @endif

          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="{{url('/')}}">Home</a></li>
                @foreach ($cat_menu as $menu)
                    <li><a href="{{url('category/'.$menu->slug)}}">{{$menu->name}}</a></li>
                @endforeach
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>


@yield('content')


    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>{{$setting->description}}</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left mr-5">
              <li><a href="{{route('about')}}">About Us</a></li>
              <li><a href="{{route('contact')}}">Contact Us</a></li>
              <li><a href="#">Subscribes</a></li>
            </ul>
            <ul class="list-unstyled float-left">
            @foreach ($cat_menu as $footer_menu)
                <li><a href="{{url('category/'.$footer_menu->slug)}}">{{$footer_menu->name}}</a></li>
            @endforeach
            </ul>
          </div>
          <div class="col-md-4">


            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a href="{{$setting->fb_url}}"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="{{$setting->tw_url}}"><span class="icon-twitter p-2"></span></a>
                <a href="{{$setting->ig_url}}"><span class="icon-instagram p-2"></span></a>
                <a href="{{$setting->rh_url}}"><span class="icon-rss p-2"></span></a>
                <a href="mailto:{{$setting->email}}"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> {{$setting->footer_info}} | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="{{asset('assets')}}/js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('assets')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('assets')}}/js/jquery-ui.js"></script>
  <script src="{{asset('assets')}}/js/popper.min.js"></script>
  <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('assets')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('assets')}}/js/jquery.countdown.min.js"></script>
  <script src="{{asset('assets')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('assets')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{asset('assets')}}/js/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="{{asset('assets')}}/js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
<script>
    @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

  </body>
</html>
