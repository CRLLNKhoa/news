@extends('layouts.home')
@section('main')
<section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $post)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a title="xem tin {{$post->title}}" href="{{route('xem-tin',["slug"=>$post->slug])}}">
                                <img class="card-img rounded-0" src="{{asset('images/'.$post->image)}}" alt="">
                                </a>
                                <a title="xem tin {{$post->title}}" href="{{route('xem-tin',["slug"=>$post->slug])}}" class="blog_item_date">
                                    {{-- <h3>15</h3> --}}
                                    <p>{{$post->created_at}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a title="xem tin {{$post->title}}" class="d-inline-block" href="{{route('xem-tin',["slug"=>$post->slug])}}">
                                    <h2>{{$post->title}}</h2>
                                </a>
                                <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                    he earth it first without heaven in place seed it second morning saying.</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> 
                                        {{$post->author}}</a></li>
                                    {{-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> --}}
                                </ul>
                            </div>
                        </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{$posts->links("pagination::bootstrap-4")}}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                    
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Chuyên đề</h4>
                            <ul class="list cat-list">
                                @foreach($cates as $cate)
                                <li>
                                    <a  class="d-flex" href="{{route('chuyen-muc',["slug"=>$cate->slug])}}">
                                        <p>{{$cate->name}}</p>
                                        {{-- <p>(37)</p> --}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Gần đây</h3>
                            @foreach($most_recents as $m)
                             <div class="media post_item">
                                <a title="xem tin {{$m->title}}" href="{{route('xem-tin',["slug"=>$m->slug])}}">
                                   <img style="max-width: 120px;" src="{{asset('images/'.$m->image)}}" alt="post">
                                </a>
                                <div class="media-body">
                                   <a title="xem tin {{$m->title}}" href="{{route('xem-tin',["slug"=>$m->slug])}}">
                                      <h3>{{$m->title}}</h3>
                                   </a>
                                   <p>{{$m->created_at}}</p>
                                </div>
                             </div>
                             @endforeach
                            
                        </aside>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection