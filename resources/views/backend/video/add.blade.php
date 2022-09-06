@extends('layouts.admin')
@section('page-title')
<a class="navbar-brand" href="{{route('video.index')}}">Video</a>
@endsection
@section('content')
<div class="col-12">
	<h4>Thêm video mới</h4>
	<form action="{{route('video.store')}}" method="post">
		@method('POST')
		@csrf
		<div class="form-group text-right">
			<button type="submit" class="btn btn-primary">SAVE</button>
		</div>
		<div class="form-group">
			<input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="Nhập tiêu đề cho video">
		</div>
		<div class="form-group">
			<input type="text" value="{{old('links')}}" name="links" id="link_video" class="form-control" placeholder="Chỉ nhận link video youtube">
		</div>

	</form>
	<iframe id="ifrm" width="100%" height="450" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endsection
@section('js')

<script type="text/javascript">
        CKEDITOR.replace( 'content' );
        $('#link_video').keyup(function(){
        	var oldUrl = $(this).val();
        	var newUrl = oldUrl.replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/")
        	$('#ifrm').attr('src', newUrl);
        	// alert(newUrl);
        });
</script
@endsection
