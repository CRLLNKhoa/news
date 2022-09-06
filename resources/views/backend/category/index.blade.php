@extends('layouts.admin')
@section('page-title')
<a class="navbar-brand" href="{{route('category.index')}}">Chuyên đề</a>
@endsection
@section('content')
	
	<div class="card">
		<div class="card-header">
		<h4 class="card-title"> Danh sách</h4>
		</div>
	<div class="row">
		<div class="col-6 ml-3">
			<button class="btn btn-primary show-f-add"><i class="nc-icon nc-simple-add"></i>  Thêm mới</button>
			
			<form action="{{route('category.store')}}" method="post" class="add-category" style="display: none;">
				@method('POST')
				@csrf
				<button type="submit" class="btn btn-info"><i class="nc-icon nc-send"></i>  Save</button>
				<button type="button" class="btn btn-danger cancel-f-add">Cancel</button>	
				<div class="form-group">
					<input value="{{old('name')}}" type="text" class="form-control" placeholder="Nhập tên chuyên đề mới" name="name" required>
				</div>
			</form>
		</div>
		<div class="col-4">
			
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive-sm">
			<table class="table">
			  
			  <thead class="text-primary">
			    <tr>
			      <th scope="col">STT</th>
			      <th scope="col">Tên</th>
			      <th scope="col">Ngày tạo</th>
			      <th scope="col">Ngày cập nhật</th>
			      <th scope="col">URL</th>
			      <th scope="col" class="text-right">Chức năng</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($categories as $category)
			    @if(isset($cate) !=null)
			    @if($cate->id == $category->id)
			    
			    <tr>
			      <td>{{$category->id}}</td>
			      <form action="{{route('category.update',['category'=>$category->id])}}"  method="post">
				    @method('PUT')
	                @csrf
			      <td><input type="text" class="form-control" name="name" value="{{$cate->name}}"></td>
			      <td>{{$category->created_at}}</td>
			      <td>{{$category->updated_at}}</td>
			      <td>{{$category->slug}}</td>
			      <td class="d-flex justify-content-end">
			      	<button type="submit" class="btn btn-primary"><i class="nc-icon nc-send"></i> Cập nhật</button>
		      		</form>
			      	<form action="{{ route('category.destroy', ['category' => $category->id ]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có chắc muốn xóa chuyên đề này không ?');" class="btn btn-danger ml-1">DELETE</button>
                	</form>
			      </td>
			    </tr>
			    
			    @else
			    
			    <tr>
			      <td>{{$category->id}}</td>
			      <td><a href="{{route('category.edit', ['category' => $category->id ])}}" class="text-primary">{{$category->name}}</a></td>
			      <td>{{$category->created_at}}</td>
			      <td>{{$category->updated_at}}</td>
			      <td>{{$category->slug}}</td>
			      <td class="text-right d-flex justify-content-end">
			      	<a href="{{route('category.edit', ['category' => $category->id ])}}" class="btn btn-warning">EDIT</a>
			      	<form action="{{ route('category.destroy', ['category' => $category->id ]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có chắc muốn xóa chuyên đề này không ?');" class="btn btn-danger ml-1">DELETE</button>
                	</form>
			      </td>
			    </tr>
			    @endif

			    @else
			    <tr>
			      <td>{{$category->id}}</td>
			      <td><a href="{{route('category.edit', ['category' => $category->id ])}}" class="text-primary">{{$category->name}}</a></td>
			      <td>{{$category->created_at}}</td>
			      <td>{{$category->updated_at}}</td>
			      <td>{{$category->slug}}</td>
			      <td class="d-flex justify-content-end">
			      	<a href="{{route('category.edit', ['category' => $category->id ])}}" class="btn btn-warning">EDIT</a>
			      	<form action="{{ route('category.destroy', ['category' => $category->id ]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có chắc muốn xóa chuyên đề này không ?');" class="btn btn-danger ml-1">DELETE</button>
                	</form>
			      </td>
			    </tr>
			    @endif
			    @endforeach
			  </tbody>
			</table>
		</div>
		<div class="col-12 d-flex justify-content-center">
				{{$categories->links("pagination::bootstrap-4")}}
		</div>
	</div>
	</div>
@endsection
@section('js')

<script type="text/javascript">
	$('.show-f-add').click(function(){
		$('.add-category').slideDown("slow");
		$(this).hide();
	})
	$('.cancel-f-add').click(function(){
		$('.add-category').slideUp("slow");
		$('.show-f-add').show();
	})
	
</script>
@endsection