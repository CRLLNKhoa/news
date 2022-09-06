@extends('layouts.home')
@section('main')
<!-- Trending Area Start -->
@include('frontend.includes.trending-main')    
<!-- Trending Area End -->

<!-- Whats New  Start -->
@include('frontend.includes.what-new')
<!-- Whats New End -->

<!--   Weekly2-News start -->
@include('frontend.includes.weekly2-new')
<!-- End Weekly-News -->
<!-- Start Video Area -->
{{-- @include('frontend.includes.video-area') --}}
<!-- End Start Video area-->
<!--   Weekly3-News start -->
{{-- @include('frontend.includes.weekly3-new')           --}}
<!-- End Weekly-News -->
@endsection
@section('js')
<script type="text/javascript">
	$(".btn-play-video").click(function(){
		var url =$(this).attr("data-url");
		$('#ifrm').attr('src', url);
	});
	$(".slider-video-next").slick({
	  infinite: true,
	  prevArrow:$("#prev-slider-video"),
	  nextArrow:$("#next-slider-video"),
	  dots:false,
	  slidesToShow: 4,
	  slidesToScroll: 1
	});
</script>
@endsection