<div class="weekly2-news-area pt-50 pb-30 gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <div class="row">
                <!-- Banner -->
                
                <div class="col-lg-12">
                    <div class="slider-wrapper">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="small-tittle mb-30">
                                    <h4>Phổ biến nhất</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Slider -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="weekly2-news-active d-flex">
                                    <!-- Single -->
                                    @foreach($most_populars as $m)
                                    <div class="weekly2-single">
                                        <div class="weekly2-img">
                                            <img style="max-height: 300px;" src="{{asset('images/'.$m->image)}}" alt="">
                                        </div>
                                        <div class="weekly2-caption">
                                            <h4><a href="{{route('xem-tin',["slug"=>$m->slug])}}">{{$m->title}}</a></h4>
                                            <p>{{$m->author}}  |  {{$m->created_at}}</p>
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
</div>  