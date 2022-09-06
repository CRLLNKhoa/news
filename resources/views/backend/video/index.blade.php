@extends('layouts.admin')
@section('page-title')
<a class="navbar-brand" href="{{route('video.index')}}">Video</a>
@endsection
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"> Danh sách</h4>
		</div>
		<div class="row">
			<div class="col-6 ml-3">
				<a href="{{route('video.create')}}" class="btn btn-primary"><i class="nc-icon nc-simple-add"></i>  Thêm mới</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive-sm">
				<table class="table">
					<thead class=" text-primary">
					  <tr>
					  	<th>Tiêu đề</th>
					  	<th>Links</th>
					  	<th>Ngày đăng</th>
					  	<th class="text-right">Chức năng</th>
					  </tr>
					</thead>
					<tbody>
						@foreach($videos as $video)
	  					<tr>
	  						<td>{{$video->title}}</td>
	  						<td><a data-url="{{$video->links}}" class="preview-video" data-toggle="modal" data-target="#exampleModalLong" href="#">Nhấn để xem preview video</a></td>
	  						<td>{{$video->created_at}}</td>
	  						<td class="d-flex justify-content-end">
	  							<a href="{{route('video.edit', ['video' => $video->id ])}}" class="btn btn-warning"><i class="nc-icon nc-refresh-69"></i></a>
						      	<form action="{{ route('video.destroy', ['video' => $video->id ]) }}" method="post">
			                    @method('DELETE')
			                    @csrf
			                    <button onclick="return confirm('Bạn có chắc muốn xóa video này không ?');" class="btn btn-danger ml-1"><i class="nc-icon nc-simple-remove"></i></button>
			                	</form>
	  						</td>
	  					</tr>
	  					@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-12 d-flex justify-content-center">
				{{$videos->links("pagination::bootstrap-4")}}
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Xem Video</h5>
        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<iframe id="ifrm"  width="100%" height="500" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$('.preview-video').click(function(){
		 var urlVideo = 	$(this).attr("data-url");
		 $('#ifrm').attr('src', urlVideo);
	});
	$('#close-modal').click(function(){
		$('#ifrm').attr('src', '');
	});
</script>
@endsection