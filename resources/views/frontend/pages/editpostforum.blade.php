@extends('layouts.home')
@section('main')
   @if ($errors->any())
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach
   @endif
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <form action="{{route('updateforum',['id'=>$post->id])}}" method="post">
               @method('POST')
               @csrf
               <input type="text" style="padding:10px;" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" value="{{$post->title}}">
               <div class="form-group mt-5">
                  <textarea class="content" id="content" name="content">{{$post->content}}</textarea>
               </div>
               <div class="form-group">
                  <select class="form-control" name="status">
                     <option @if($post->status == 'publish') selected @endif value="publish">Hiện</option>
                     <option @if($post->status == 'draft') selected @endif value="draft">Ẩn</option>
                  </select>
               </div>
               <div class="form-group text-right">
                  <button class="btn btn-success">Cập nhật</button>
               </div>
              
               </form>
            </div>
         </div>
      </div>
   </section>
@endsection
@section('js')
   <script type="text/javascript">
      CKEDITOR.replace( 'content' ); 
   </script>
@endsection