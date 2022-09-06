@extends('layouts.home')
@section('main')
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="assets/img/blog/single_blog_1.png" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{$post->title}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> {{$post->author}}</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i></a></li>
                     </ul>
                     <div class="content">
                        {!!$post->content!!}
                     </div>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span>4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        @if($post->type != 'forum')
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           @if($prev_post != null)
                           <div class="thumb">
                              <a href="{{route('xem-tin',['slug'=>$prev_post->slug])}}">
                                 <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="detials">
                              <a class="text-dark" href="{{route('xem-tin',['slug'=>$prev_post->slug])}}"><span class="lnr text-white ti-arrow-left"></span> Tin trước đó</a>
                           </div>
                           @endif
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           @if($next_post != null)
                           <div class="detials">
                              <a class="text-dark" href="{{route('xem-tin',['slug'=>$next_post->slug])}}">
                                 Tin kế tiếp <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="{{route('xem-tin',['slug'=>$next_post->slug])}}">
                                 <img class="img-fluid" src="assets/img/post/next.png" alt="">
                              </a>
                           </div>
                           @endif
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
               {{-- <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="{{asset('frontend/assets/img/blog/author.png')}}" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4>{{$post->author}}</h4>
                        </a>
                        <p>"Cập nhật những bài viết nhanh chóng và bổ ích"</p>
                     </div>
                  </div>
               </div> --}}
               <div class="comments-area">
                  @comments(['model' => $post])
                  {{-- <h4>05 Comments</h4>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('frontend/assets/img/comment/comment_1.png')}}" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                 Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('frontend/assets/img/comment/comment_2.png')}}" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                 Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('frontend/assets/img/comment/comment_3.png')}}" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                 Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> --}}
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