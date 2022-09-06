<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
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
        $categories = Category::paginate(8);
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:categories|max:255',
        ],
            [
                'name.unique' => 'Chuyên đề bạn nhập đã tồn tại!!',
            ]);
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = Str::of($data['name'])->slug('-');
        $category->save();
        return redirect()->back()->with('status','Đã thêm một chuyên đề mới !');
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
        $categories = Category::all();
        $cate = Category::find($id);
        return view('backend.category.index',compact('categories','cate'));
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
        $category = Category::find($id);
        $data = $request->validate([
            'name' =>  ['required',Rule::unique('categories')->ignore($category->id, 'id')],
            ],
            [
                'name.unique' => 'Chuyên đề bạn sữa đã tồn tại rồi!!',
            ]);
        $category->name = $data['name'];
        $category->slug = Str::of($data['name'])->slug('-');
        $category->save();
        return redirect()->route('category.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('category.index')->with('status','Đã xóa thành công');
    }
}
