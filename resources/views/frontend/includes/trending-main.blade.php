<div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            
                            <!-- Single -->
                            @foreach($trendings->slice(0, 3) as $trending)
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        
                                            <img style="max-height:400px;" src="{{asset('images/'.$trending->image)}}" alt="">
                                        
                                        <div class="trend-top-cap">
                                            @foreach($trending->postCategory as $cat)
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{$cat->name}}</span>
                                            @endforeach
                                            
                                            <h2><a href="{{route('xem-tin',['slug'=>$trending->slug])}}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$trending->title}}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">{{$trending->author}}   -   {{$trending->created_at}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">
                            @foreach($trendings->slice(3,5) as $trending)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        
                                            <img src="{{asset('images/'.$trending->image)}}" alt="">
                                        
                                        <div class="trend-top-cap trend-top-cap2">
                                            @foreach($trending->postCategory as $cat)
                                            <span class="bgb">{{$cat->name}}</span>
                                            @endforeach
                                            <h2><a href="{{route('xem-tin',['slug'=>$trending->slug])}}">{{$trending->title}}</a></h2>
                                            <p>{{$trending->author}}   -   {{$trending->created_at}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>