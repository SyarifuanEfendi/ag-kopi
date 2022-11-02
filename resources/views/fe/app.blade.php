<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('images/logoPinggir.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      @yield('styles')
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   @yield('body')
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{url('/')}}"><img src="{{ asset('images/logoPinggir.png') }}" width="25%" alt="#" /></a>
                              <!-- <a href="index.html"><h1 style="color: white;">AG Kopi</h1></a> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                 <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{url('about')}}">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->is('service') ? 'active' : '' }}" href="{{url('service')}}">GIS</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{url('galeri')}}">Galeri</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->is('blog') || Request::is('blog_detail/*') ? 'active' : '' }}" href="{{url('blog')}}">Artikel</a>
                              </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ request()->is('view_file') || request()->is('view_video')  ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Database
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{url('view_file')}}">File</a>
                                        <a class="dropdown-item" href="{{url('view_video')}}">Video</a>
                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a> -->
                                    </div>
                                </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{url('contact')}}">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <div class="yellow_darkbg">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                  @yield('header')
                 </div>
              </div>
           </div>
        </div>
     </div>
    @yield('content')
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <!-- <img class="logo1" src="images/logo1.png" alt="#"/> -->
                     <h3>AG-KOPI</h3>
                     <ul class="about_us">
                        <li>Aplikasi Untuk Percetapan <br>
                        Kegiatan Ekspor Kopi Arabika <br>
                        di Dinas Pertanian dan Perkebunan Kabupaten Kediri
                        </li>
                     </ul>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
                  <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <h3>Useful Link</h3>
                     <ul class="link_menu">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('about')}}">About</a></li>
                        <li><a href="{{url('service')}}">GIS</a></li>
                        <li><a href="{{url('galeri')}}">Galeri</a></li>
                        <li><a href="{{url('artikel')}}">Artikel</a></li>
                        <li><a href="{{url('view_file')}}">File</a></li>
                        <li><a href="{{url('view_video')}}">Video</a></li>
                        <li><a href="{{url('contact')}}">Contact Us</a></li>
                     </ul>
                  </div> -->
                  <div class="col-md-8 offset-md-4 ">
                     <form class="bottom_form">
                        <h3>Newsletter</h3>
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2022 All Rights Reserved. Design by @SyarifuanEfendi</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      @stack('javascript')
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
   </body>
</html>

