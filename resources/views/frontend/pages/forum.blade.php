@extends('layouts.home')
@section('main')
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               @if(Auth::check())
               <a href="{{route('addforum')}}" class="btn-primary btn-sm">Viết bài mới <i class="fa fa-plus"></i></a>
               @endif
               <div class="comments-area">
               <h4>Bài thảo luận ({{$posts->count()}})</h4>
                  
                  @foreach($posts as $post)
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('frontend/assets/img/comment/comment_1.png')}}" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 <a href="{{route('xem-tin',['slug'=>$post->slug])}}" style="font-weight:bold;color: black!important;">
                                 {{$post->title}}
                                 </a>
                              </p>
                              <h5>
                                 Người viết : <a href="{{url('forums?author='.$post->user_id)}}" style="color:blue;">{{$post->user->name}}</a>
                              </h5>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    
                                    <p>{{$post->created_at}}</p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">Chi tiết</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  
               </div>

              
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Chuyên đề</h4>
                     <ul class="list cat-list">
                        @foreach($cates as $cate)
                        <li>
                           <a href="{{route('chuyen-muc',["slug"=>$cate->slug])}}" class="d-flex">
                              <p>{{$cate->name}}</p>
                           </a>
                        </li>
                        @endforeach
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Gần đây nhất</h3>
                     @foreach($most_recents as $m)
                     <div class="media post_item">
                        <a href="{{route('xem-tin',["slug"=>$m->slug])}}">
                           <img style="max-width: 120px;" src="{{asset('images/'.$m->image)}}" alt="post">
                        </a>
                        <div class="media-body">
                           <a href="{{route('xem-tin',["slug"=>$m->slug])}}">
                              <h3>{{$m->title}}</h3>
                           </a>
                           <p>{{$m->created_at}}</p>
                        </div>
                     </div>
                     @endforeach
                  </aside>
                  {{-- <aside class="single_sidebar_widget tag_cloud_widget">
                     <h4 class="widget_title">Từ khóa</h4>
                     <ul class="list">
                        
                        <li>
                           <a href="#">project</a>
                        </li>
                        <li>
                           <a href="#">love</a>
                        </li>
                        <li>
                           <a href="#">technology</a>
                        </li>
                        <li>
                           <a href="#">travel</a>
                        </li>
                        <li>
                           <a href="#">restaurant</a>
                        </li>
                        <li>
                           <a href="#">life style</a>
                        </li>
                        <li>
                           <a href="#">design</a>
                        </li>
                        <li>
                           <a href="#">illustration</a>
                        </li>
                     </ul>
                  </aside> --}}
      
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection