<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Str;
use Auth;
use Cacbon\Cacbon;

class IndexController extends Controller
{
    public function Index()
    {
        $cates = Category::all();
        // lấy tin mới
        $news = Post::where('popular',0)->orderBy('created_at','DESC')->where('status','publish')->get();
        // lấy tin thịnh hành
        $trendings = Post::where('popular',2)->orderBy('created_at','DESC')->where('status','publish')->take(5)->get();
        // dd($trendings);
        //lấy tin phô biến nhất
        $most_populars = Post::where('popular',3)->orderBy('created_at','DESC')->where('status','publish')->take(6)->get();
        //tin gần đây
        $most_recents = Post::orderBy('created_at','DESC')->where('status','publish')->where('type','post')->take(3)->get();
        $videos = Video::orderBy('created_at','DESC')->get();
        return view('index',compact('cates','trendings','news','most_populars','most_recents','videos'));
    } 
    public function detail($slug)
    {
        $cates = Category::all();
        $post = Post::where('slug',$slug)->first();
        $post->increment('view');
        $most_recents = Post::orderBy('created_at','DESC')->where('status','publish')->where('type','post')->take(4)->get();
        
        $prev_id = Post::where('id','<',$post->id)->max('id');
        $prev_post = Post::find($prev_id);

        $next_id = Post::where('id','>',$post->id)->min('id');
        $next_post = Post::find($next_id);
        
        return view('frontend.pages.detail',compact("post","cates","most_recents","next_post","prev_post"));
    }
    public function excute()
    {
        $cates = Category::all();
        $currentUrl = url()->current();
        $posts = '';
        if ($currentUrl == route('pho-bien')) {
            $posts = Post::where('popular',3)->orderBy('created_at','DESC')->where('status','publish')->paginate(6);
            $most_recents = Post::orderBy('created_at','DESC')->where('status','publish')->where('type','post')->take(4)->get();
            return view("frontend.pages.popular",compact("cates","posts","most_recents"));
        }
        elseif($currentUrl == route('thinh-hanh'))
        {
            $posts = Post::where('popular',2)->orderBy('created_at','DESC')->where('status','publish')->paginate(6);
            $most_recents = Post::orderBy('created_at','DESC')->where('status','publish')->where('type','post')->take(4)->get();
            return view("frontend.pages.popular",compact("cates","posts","most_recents"));
        }
        else
        {
            $posts = Post::where('popular',0)->orderBy('created_at','DESC')->where('status','publish')->paginate(8);
            return view("frontend.pages.category",compact("cates","posts"));
        }

        // dd($posts);
        
    }
    public function forums()
    {
        $cates = Category::all();
        if(isset($_GET['author']))
        {
            $posts = Post::where('status','publish')->where('type','forum')->where('user_id',$_GET['author'])->orderBy('created_at','DESC')->get();   
        }
        else
        {
            $posts = Post::where('status','publish')->where('type','forum')->orderBy('created_at','DESC')->get();
        }
        $most_recents = Post::orderBy('created_at','DESC')->where('status','publish')->where('type','post')->take(4)->get();
        return view('frontend.pages.forum',compact('cates','most_recents','posts'));
    }
    public function addforum()
    {
        $cates = Category::all();
        return view('frontend.pages.add_forum',compact('cates'));
    }
    public function category($slug)
    {
        $cates = Category::all();
        $category_id = Category::where('slug',$slug)->first();
        $multi_post = [];
        foreach($category_id->post as $category){
            $multi_post[] = $category->id;
        }
        $posts = Post::where('status','publish')->orderBy("created_at","DESC")->whereIn('id',$multi_post)->paginate(8);
        return view("frontend.pages.category",compact("cates","posts"));
    }
    public function search(Request $request)
    {
        $cates = Category::all();
        
        $posts = Post::where("status","publish")->orderBy("created_at","DESC")->where('title', 'LIKE', '%' . $request->search . '%')->paginate(8);
        // dd($posts);
        return view("frontend.pages.category",compact("cates","posts"));   
    }
    public function storeforum(Request $request)
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
        return redirect()->route('forums')->with("status","Thêm thành công");
    }
    public function mypost()
    {
        $posts = Post::where('user_id',Auth::id())->where('type','forum')->get();
        $cates = Category::all();
        return view('frontend.pages.showpost',compact('posts','cates'));
    }
    public function editforum($post)
    {
        $post = Post::find($post);
        $cates = Category::all();
        return view('frontend.pages.editpostforum',compact('post','cates'));   
    }
    public function updateforum(Request $request,$id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->save();
        return redirect()->route('my-post');
    }
}
