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
               <form action="{{route('storeforum')}}" method="post">
               @method('POST')
               @csrf
               <input type="text" style="padding:10px;" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" value="{{old('title')}}">
               <div class="form-group mt-5">
                  <textarea class="content" id="content" name="content">{{old('content')}}</textarea>
               </div>
               <input type="hidden" name="type" value="forum">
               <input type="hidden" name="author" value="{{Auth::user()->name}}">
               <input type="hidden" name="status" value="publish">
               <div class="form-group text-right">
                  <button class="btn btn-success">Đăng bài</button>
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