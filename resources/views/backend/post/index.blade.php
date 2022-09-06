@extends('layouts.admin')
@section('page-title')
<a class="navbar-brand" href="{{route('post.index')}}">Bài viết</a>
@endsection
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"> Danh sách</h4>
		</div>
		<div class="row">
			<div class="col-6 ml-3">
				<a href="{{route('post.create')}}" class="btn btn-primary"><i class="nc-icon nc-simple-add"></i>  Thêm tin tức mới</a>
				<a href="{{route('post.index')}}" class="btn btn-dark">Tin tức</a>
				<a href="{{route('post.index',['type'=>'forum'])}}" class="btn btn-danger">Tin forum</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive-sm">
				<table class="table" id="PhanTrang">
					<thead class=" text-primary">
					  <tr>
					  	<th>Tiêu đề</th>
					  	@if(!isset($_GET['type']))
					  	<th>Ảnh bìa</th>
					  	<th>Chuyên đề</th>
					  	@else
					  	<th>Người đăng</th>
					  	@endif
					  	<th>Trạng thái</th>
					  	<th>Loại tin</th>
					  	<th>Ngày đăng</th>
					  	<th class="text-right">Chức năng</th>
					  </tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
						
	  					<tr>
	  						<td>{{$post->title}}</td>
	  						@if(!isset($_GET['type']))
	  						<td>@if($post->image != null)<img style="max-height: 60px;" src="{{asset('images/'.$post->image)}}">
	  							@endif
	  						</td>
	  						<td>
	  							@foreach($post->postCategory as $cat)
                  				<span class="badge badge-pill badge-success">{{$cat->name}}</span>
                  				@endforeach
	  							
	  						</td>
	  						@else
	  						<td>{{$post->user->name}}
	  							
	  						</td>
	  						@endif
	  						<td>
	  							@if($post->status == "draft")
	  								<span class="badge badge-pill badge-danger">Bản nháp</span>
	  							@else
	  								<span class="badge badge-pill badge-primary">Đã đăng tải</span>	
	  							@endif
	  						</td>
	  						
	  						<td>
	  							@if($post->popular == 1)
	  							<span class="badge badge-pill badge-info">Tin nổi bật</span>
	  							@elseif($post->popular == 2)
	  							<span class="badge badge-pill badge-info">Tin thịnh hành</span>
	  							@elseif($post->popular == 3)
	  							<span class="badge badge-pill badge-info">Phổ biến nhất</span>
	  							@elseif($post->popular == 5)
	  							<span class="badge badge-pill badge-danger">Tin forum</span>
	  							@else
	  							<span class="badge badge-pill badge-info">Tin mới</span>
	  							@endif
	  						</td>
	  						<td>{{$post->created_at}}</td>
	  						<td class="d-flex justify-content-end">
	  							@if(!isset($_GET['type']))
	  							<a href="{{route('post.edit', ['post' => $post->id ])}}" class="btn btn-warning"><i class="nc-icon nc-refresh-69"></i></a>
	  							@endif
						      	<form action="{{ route('post.destroy', ['post' => $post->id ]) }}" method="post">
			                    @method('DELETE')
			                    @csrf
			                    <button onclick="return confirm('Bạn có chắc muốn xóa bài viết này không ?');" class="btn btn-danger ml-1"><i class="nc-icon nc-simple-remove"></i></button>
			                	</form>
	  						</td>
	  					</tr>

	  					@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-12 d-flex justify-content-center">
				{{$posts->links("pagination::bootstrap-4")}}
			</div>
		</div>
	</div>
</div>
@endsection