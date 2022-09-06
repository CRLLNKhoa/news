<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('backend/assets/img/logo-small.png')}}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          MANAGE
          <!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li  class="{{ (Request::is('dashboard') ? 'active' : '') }}">
            <a href="{{url('dashboard')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  class="{{ Request::routeIs('category.index') ? 'active' : '' }}">
            <a href="{{route('category.index')}}">
              <i class="nc-icon nc-diamond"></i>
              <p>Chuyên đề</p>
            </a>
          </li>
          <li class="{{ Request::routeIs('post.index') ? 'active' : '' }}{{ Request::routeIs('post.create') ? 'active' : '' }}{{ Request::routeIs('post.edit') ? 'active' : '' }}">
            <a href="{{route('post.index')}}">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Bài viết</p>
            </a>
          </li>
          {{-- <li class="{{ Request::routeIs('video.index') ? 'active' : '' }}{{ Request::routeIs('video.create') ? 'active' : '' }}{{ Request::routeIs('video.edit') ? 'active' : '' }}">
            <a href="{{route('video.index')}}">
              <i class="nc-icon nc-button-play"></i>
              <p>Video</p>
            </a>
          </li> --}}

        </ul>
      </div>
    </div>