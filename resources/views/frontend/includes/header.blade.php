<style type="text/css">
    li.active{
        background-color: #fff;

    }
    li.active a{
        color: red!important;
    }
    .header-banner a{
        transition: 0.3s all;
        text-transform: uppercase;
    }
    .header-banner a:hover{

        color: blue!important;
    }
</style>
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-mid gray-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="index.html"><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                @if (Auth::check())
                                <div class="dropdown">
                                  <a style="cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->name}}
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    @if(Auth::user()->role == 1)
                                    <a class="dropdown-item" href="{{url('dashboard')}}">Quản trị</a>

                                    @endif
                                    <a class="dropdown-item" href="{{route('my-post')}}">Bài đăng</a>
                                    <a class="dropdown-item" href="{{route('signout')}}">Đăng xuất</a>
                                  </div>
                                </div>
                                    
                                @else
                                <a class="text-dark border-right pr-2" href="{{url("registration")}}">Đăng ký</a>
                                <a class="text-dark pl-1" href="{{route("login")}}">Đăng nhập</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html"><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">
                                        <li class="{{ Request::routeIs('index') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="#">Tin tức</a>
                                            <ul class="submenu">
                                                <li><a href="{{route('tin-moi')}}">Tin mới</a></li>
                                                <li><a href="{{route('thinh-hanh')}}">Thịnh hành</a></li>
                                                <li><a href="{{route('pho-bien')}}">Phổ biến</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">Chuyên mục</a>
                                            <ul class="submenu">
                                                @foreach($cates as $cate)
                                                <li><a href="{{route('chuyen-muc',["slug"=>$cate->slug])}}">{{$cate->name}}</a></li>
                                                @endforeach
                                                
                                            </ul>
                                        </li>
                                        
                                        <li><a href="{{route('forums')}}">Forums</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             

                        <div class="col-xl-4 col-lg-4 col-md-4 input-group rounded">
                            <form action="{{route('search')}}" method="post" style="width:100%;">
                            @method("POST")
                            @csrf 
                            <div class="form-inline" >
                            <input style="width:88%;box-shadow: none;border-radius: 0;border: 0;" class="form-control input-search" name="search" placeholder="Tìm kiếm"  required  />

                              <button style="width: 12%;
                                            height: 38px;
                                            background: white;
                                            border: 0;border-left:1px solid grey ;cursor: pointer;" type="submit" class="btn-search">
                                <i class="fa fa-search" style="color: #ff2143;"></i>
                              </button>
                            </div>   
                            </form>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>