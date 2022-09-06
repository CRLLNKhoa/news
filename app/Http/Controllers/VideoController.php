<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VideoController extends Controller
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
        $videos = Video::paginate(8);
        return view("backend.video.index",compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.video.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:videos|max:255',
            'links' => 'required'
        ],
            [
                'title.unique' => 'Trùng tên tiêu đề video!!',
                'title.required' => 'Chưa nhập tiêu đề video!!',
                'links.required' => 'Chưa nhập link video!!'
            ]);
        $video = new Video();
        $video->title = $data['title'];
        $newLinks = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$request->links);
        // dd($newLinks);

        $video->links = $newLinks;
        
        $video->save();
        return redirect()->route('video.index')->with('status','Đã thêm một video mới !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view("backend.video.edit",compact("video"));
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
        $video = Video::find($id);
        $data = $request->validate([
            'title' => ['required',Rule::unique('videos')->ignore($video->id, 'id')],
            'links' => 'required'
        ],
            [
                'title.unique' => 'Trùng tên tiêu đề video!!',
                'title.required' => 'Chưa nhập tiêu đề video!!',
                'links.required' => 'Chưa nhập link video!!'
            ]);
        $video->title = $data['title'];
        $newLinks = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$request->links);
        // dd($newLinks);

        $video->links = $newLinks;
        
        $video->save();
        return redirect()->route('video.index')->with('status','Đã cập nhật lại video!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::find($id)->delete();
        return redirect()->back()->with("status","Đã xóa video thành công !!");
    }
}
