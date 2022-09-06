@extends('layouts.home')
@section('main')
	<!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
                <div class="row">
                <div class="col-12">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                            
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        
                                            <div class="row">
                                                @foreach($posts as $post)
                                                
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-img">
                                                            <a title="Xem tin {{$post->title}}" href="{{route('xem-tin',["slug"=>$post->slug])}}">
                                                            <img src="{{asset('images/'.$post->image)}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="whates-caption whates-caption2">
                                                            <h4><a title="Xem tin {{$post->title}}" href="{{route('xem-tin',["slug"=>$post->slug])}}">{{$post->title}}</a></h4>
                                                            <span>by {{$post->author}}   -   {{$post->created_at}}</span>
                                                            <p style="">Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
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
        </div>
    </div>
    <!-- About US End -->
    <!--Start pagination -->
    <div class="pagination-area  gray-bg pb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-2">
                    {{$posts->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
@endsection