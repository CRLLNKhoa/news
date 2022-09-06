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
                                       <a href="#">Người đăng : {{$post->user->name}}</a>
                                    </h5>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-start">
                                    

                                    <p style="font-size:12px;">{{$post->created_at}} - Lượt xem - {{$post->view}} - Trạng thái : 
                                       @if($post->status == 'draft')
                                       <span class="badge badge-danger">Ẩn</span>
                                       @else
                                       <span class="badge badge-success">Hiện</span>
                                       @endif
                                    </p>
                                 </div>
                                 <div class="reply-btn">
                                    <a style="color:blue;" href="{{route('editforum',['forum'=>$post->id])}}" class="btn-reply text-uppercase">Chỉnh sửa</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  
               </div>

              
            </div>
         
         </div>
      </div>
   </section>
@endsection