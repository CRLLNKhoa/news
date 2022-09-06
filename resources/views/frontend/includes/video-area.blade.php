 <style type="text/css">
    .btn-play-video{
        cursor: pointer;
    }
     .btn-play-video:hover .icon-play{
        opacity: 1!important;
     }


 </style>
 <div class="youtube-area video-padding d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-12" id="video-container">
                    <div class="video-items-active">
                        <div  class="video-items text-center">
                            @foreach($videos->slice(0,1) as $video)

                            <iframe id="ifrm" width="100%" height="500" src="{{$video->links}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-12 text-right mb-2">
                        <button style="cursor: pointer!important;" id="prev-slider-video"><span class="lnr text-dark ti-arrow-left"></span></button>
                        <button style="cursor: pointer!important;" id="next-slider-video"><span class="lnr text-dark ti-arrow-right"></span></button>
                    </div>
                    <div class="col-12 slider-video-next">
                        {{-- <div class="testmonial-nav text-center"> --}}
                        @foreach($videos->slice(1,10) as $video)
                            <div class="single-video position-relative">
                                <iframe width="98%" height="200" src="{{$video->links}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    
                                    
                                </iframe>
                                
                                <div data-url="{{$video->links}}?autoplay=1" class="position-absolute d-flex justify-content-center btn-play-video" style="top: 0;left: 0;width: 100%;height: 100%;z-index: 999;background: #625c5c00;text-align: center;">
                                    <div class="icon-play" style="margin-top: -8px;width: 70px;opacity: 0;">
                                        <svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#f00"></path><path d="M 45,24 27,14 27,34" fill="#red"></path>
                                        </svg>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<style type="text/css">
   /* .slider-video-next */
</style>