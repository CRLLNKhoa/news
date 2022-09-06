@extends('layouts.admin')
@section('page-title')
<a class="navbar-brand" href="{{route('post.index')}}">Bài viết</a>
@endsection
@section('content')
<div class="container-fluid">
<form class="row" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
@method("POST")
@csrf
<div class="col-md-9 p-0">
	{{-- <input type="hidden" name="type" value="post"> --}}
	<h4 class="card-title">Thêm bài viêt mới</h4>
	<input type="text" style="padding:10px;" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" value="{{old('title')}}">
	<div class="form-group mt-5">
		<textarea class="content" id="content" name="content">{{old('content')}}</textarea>
	</div>
	<div class="form-group mt-5">
		<h6>Tác giả</h6>
		<input type="text" value="{{old('author')}}" class="form-control" name="author" placeholder="Nhập tên tác giả">
	</div>
</div>
<div class="col-md-3" style="margin-top:1rem!important;">
	<div class="row">
		<div class="col-12 text-right">
			<button type="submit" class="btn btn-primary">SAVE</button>
		</div>
		<div class="col-12 pl-3">
			<div class=" border-white bg-light">
			<h6 class=" p-2 border-bottom">Trạng thái</h6>
			<div class="form-group  p-3">
			
				<input @if(old('status') != null && old('status') == 'draft')                   
                        checked                        
                	@endif type="radio" id="draft" name="status" value="draft">
				<label for="draft">Bản nháp</label><br>
				
				<input 
					@if(old('status') != null && old('status') == 'publish')                   
                        checked                        
                	@endif
				 type="radio" id="publish" name="status" value="publish">
				<label for="publish">Đăng tải</label>	
				
			</div>
			</div>
		</div>
		<div class="col-12 pl-3">
			<div class=" border-white bg-light">
			<h6 class=" p-2 border-bottom">Loại Tin</h6>
			<div class="form-group  p-3">	
				
				<input 
					@if(old('popular') != null && old('popular') == 0)                   
                        checked                        
                	@endif 
                type="radio" id="popular1" name="popular" value="0">
				<label for="popular1">Tin mới</label><br>

				<input @if(old('popular') != null && old('popular') == 1)                   
                        checked                        
                	@endif  type="radio" id="popular2" name="popular" value="1">
				<label for="popular2">Tin nổi bật</label><br>

				<input @if(old('popular') != null && old('popular') == 2)                   
                        checked                        
                	@endif  type="radio" id="popular3" name="popular" value="2">
				<label for="popular3">Tin thịnh hành</label><br>

				<input @if(old('popular') != null && old('popular') == 3)                   
                        checked                        
                	@endif  type="radio" id="popular4" name="popular" value="3">
				<label for="popular4">Phổ biến nhất</label><br>
				
			</div>
			</div>
		</div>
		<div class="col-12 pl-3">
			<div class=" border-white bg-light">
			<h6 class=" p-2 border-bottom">Chuyên mục</h6>
			<div class="form-group  p-3">
				@foreach($cates as $cate)
				<input 
					@if(old('category') != null)
                    @if(in_array($cate->id,old('category')))
                    checked
                    @endif
                    @endif
				 type="checkbox" id="category_{{$cate->id}}" name="category[]" value="{{$cate->id}}">
				<label for="category_{{$cate->id}}">{{$cate->name}}</label><br>
				@endforeach
			</div>
			</div>
		</div>
		<div class="col-12 pl-3">
			<div class=" border-white bg-light">
			<h6 class=" p-2 border-bottom">Ảnh bìa</h6>
			<div class="form-group  p-3">
				<input value="{{old('image')}}" type="file" style="opacity:1;position: static;" accept="image/*" name="image">
			</div>
			</div>
		</div>
		

	</div>
</div>
</form>
</div>
@endsection
@section('js')

<script type="text/javascript">
        CKEDITOR.replace( 'content' ); 
</script>
@endsection
