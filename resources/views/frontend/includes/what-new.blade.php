<section class="whats-news-area pt-20 pb-20 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="whats-news-wrapper">
                <!-- Heading & Nav Button -->
                <div class="row justify-content-between align-items-end mb-15">
                    <div class="col-xl-4">
                        <div class="section-tittle mb-30">
                            <h3>Tin tức mới</h3>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav>                                                 
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach($cates->slice(0,5) as $cate)
                                        @if($loop->first)
                                    <a class="nav-item nav-link active" id="nav-{{$cate->id}}-tab" data-toggle="tab" href="#nav-cate-{{$cate->id}}" role="tab" aria-controls="nav-cate-{{$cate->id}}" aria-selected="true">{{$cate->name}}</a>
                                        @else
                                        <a class="nav-item nav-link" id="nav-{{$cate->id}}-tab" data-toggle="tab" href="#nav-cate-{{$cate->id}}" role="tab" aria-controls="nav-cate-{{$cate->id}}" aria-selected="true">{{$cate->name}}</a>
                                        @endif
                                    @endforeach
                                    <a class="nav-item nav-link" href="{{route("tin-moi")}}">All</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <!-- Tab content -->
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            @php $counter1= 0; @endphp
                            @php $counter2= 0; @endphp
                            @foreach($cates->slice(0,5) as $cate)
                            @if($loop->first)
                            <div class="tab-pane fade show active" id="nav-cate-{{$cate->id}}" role="tabpanel" aria-labelledby="nav-{{$cate->id}}-tab">       
                                <div class="row">
                        
                                    @foreach($news as $new)
                                        @if($cate->id == $new->category_id)
                                         @if($counter1++ < 10)
                                        <div class="col-sm-6">
                                            <div class="whats-right-single mb-20">
                                                <div class="whats-right-img">
                                                    <img style="max-width: 120px;" src="{{asset('images/'.$new->image)}}" alt="">
                                                </div>
                                                <div class="whats-right-cap">
                                                    <span class="colorb text-danger">Bản tin {{$cate->name}}</span>
                                                    <h4><a href="{{route('xem-tin',["slug"=>$new->slug])}}">{{$new->title}}</a></h4>
                                                    <p>{{$new->created_at}}</p> 
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="tab-pane fade" id="nav-cate-{{$cate->id}}" role="tabpanel" aria-labelledby="nav-{{$cate->id}}-tab">
                                <div class="row">
                                    
                                     @foreach($news as $new)
                                        @if($cate->id == $new->category_id)
                                        @if($counter2++ < 10)
                                        <div class="col-sm-6">
                                            <div class="whats-right-single mb-20">
                                                <div class="whats-right-img">
                                                    <img style="max-width: 120px;" src="{{asset('images/'.$new->image)}}" alt="">
                                                </div>
                                                <div class="whats-right-cap">
                                                    <span class="colorb">Bản tin {{$cate->name}}</span>
                                                    <h4><a href="{{route('xem-tin',["slug"=>$new->slug])}}">{{$new->title}}</a></h4>
                                                    <p>{{$new->created_at}}</p> 
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        @php $counter2 = 0; @endphp
                                        @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @endforeach
                            
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <!-- Banner -->
            <div class="banner-one mt-20 mb-30">
                <img src="{{asset('frontend/assets/img/gallery/body_card1.png')}}" alt="">
            </div>
            </div>
            <div class="col-lg-4">
                <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('frontend/assets/img/news/icon-fb.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">  
                                <span>{{DB::table('users')->count()}}</span>
                                <p>Thành viên</p>
                            </div>
                        </div> 
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('frontend/assets/img/news/icon-tw.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>{{-- {{DB::table('post')->where('')}} --}}</span>
                                <p>Bài viết</p>
                            </div>
                        </div>
                            {{-- <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('frontend/assets/img/news/icon-ins.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div> --}}
                        {{-- </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('frontend/assets/img/news/icon-yo.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- Most Recent Area -->
                <div class="most-recent-area">
                    <!-- Section Tittle -->
                    <div class="small-tittle mb-20">
                        <h4>Gần đây nhất</h4>
                    </div>
                    <!-- Details -->
                    @foreach($most_recents as $most_recent)
                    @if($loop->first)
                    <div class="most-recent mb-40">
                        <div class="most-recent-img">
                            <img src="{{asset('images/'.$most_recent->image)}}" alt="">
                            <div class="most-recent-cap">
                                <span class="bgbeg">New</span>
                                <h4><a href="{{route('xem-tin',["slug"=>$most_recent->slug])}}">{{$most_recent->title}}</a></h4>
                                <p>{{$most_recent->author}}  |  {{$most_recent->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- Single -->
                    <div class="most-recent-single">
                        <div class="most-recent-images">
                            <img style="max-width: 120px;" src="{{asset('images/'.$most_recent->image)}}" alt="">
                        </div>
                        <div class="most-recent-capt">
                            <h4><a href="{{route('xem-tin',["slug"=>$most_recent->slug])}}">{{$most_recent->title}}</a></h4>
                            <p>{{$most_recent->author}}  |  {{$most_recent->created_at}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>