<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index()
    {
        if(isset($_GET['type']))
        {
            $posts = Post::where('type','forum')->paginate(10);   
        }
        else
        {
            $posts = Post::where('type','post')->paginate(10);
        }
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::orderBy('name')->get();   
        return view('backend.post.add',compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->type == null)
        {
            $data = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'content' =>'required',
                'author' => 'required',
                'status' =>'required',
                'popular' =>'required',
                'category' => 'required',
                'image' =>'required'
                ],
                [
                    'title.unique' => 'Trùng tên bài viết !!',
                    'title.required' => 'Chưa nhập tiêu đề bài viết !!',
                  'category.required' => 'Chưa chọn chuyên mục bài viết!!',
                  'popular.required' => 'Chưa chọn loại tin bài viết !!',
                  'status.required' => 'Chưa chọn trạng thái bài viết !!',
                  'content.required' => 'Chưa nhập nội dung !!',
                  'image.required' => 'Chưa chọn ảnh !!',
                  'author.required' => 'Chưa nhập tên tác giả !!'
                ]);
        }
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request -> content;
        $post->status = $request-> status;
        if($request->type == null){
        foreach($request-> category as $category_id)
        {
            $post->category_id = $category_id[0];
        }
        $image = $request->file('image');
        $nameimg = $request->file('image')->getClientOriginalName();
        $path = $image->move('images', $nameimg);
        $post->image = $nameimg;
        $post->popular = $request-> popular;
        }
        else{
            $post->type = $request->type;
        }
        

        $post->author = $request-> author;
        $post->slug = Str::of($request->title)->slug('-');
        $post->user_id = Auth::id();
        


        $post->save();
        if($request->type == null){
        $post->postCategory()->attach($request-> category);
        }
        return redirect()->back()->with("status","Thêm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cates = Category::all();
        $categoryPost = $post->postCategory;
        return view('backend.post.edit',compact('post','cates','categoryPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $data = $request->validate([
            'title' => ['required',Rule::unique('posts')->ignore($post->id, 'id')],
            'content' =>'required',
            'author' =>'required',
            'status' =>'required',
            'popular' =>'required',
            'category' => 'required'
            ],
            [
                'title.unique' => 'Trùng tên bài viết !!',
                'title.required' => 'Chưa nhập tiêu đề bài viết !!',
              'category.required' => 'Chưa chọn chuyên mục bài viết!!',
              'popular.required' => 'Chưa chọn loại tin bài viết !!',
              'status.required' => 'Chưa chọn trạng thái bài viết !!',
              'content.required' => 'Chưa nhập nội dung !!',          
              'author.required' => 'Chưa nhập tên tác giả !!'
            ]);
        $post->title = $data['title'];
        $post->content = $request -> content;
        $post->status = $request-> status;
        
        $img = $request->image;
        
        if($img)
        {
            $image = $request->file('image');
            $nameimg = $request->file('image')->getClientOriginalName();
            $path = $image->move('images', $nameimg);
            $post->image = $nameimg;
        }
        foreach($request-> category as $category_id)
            $post->category_id = $category_id[0];
        $post->author = $request-> author;
        $post->slug = Str::of($data['title'])->slug('-');
        $post->popular = $request-> popular;
        $post->postCategory()->sync($request-> category);
        $post->save();
        return redirect()->route('post.index')->with('status','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->route('post.index')->with('status','Đã xóa thành công');
    }
}
