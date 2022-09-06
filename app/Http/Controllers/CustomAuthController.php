<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CustomAuthController extends Controller
{

    public function index()
    {
        if(Auth::check()){
            return redirect()->back();
        }
        else
        {
        $cates = Category::all();
        return view('auth.login',compact("cates"));
        }
    }  
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        $cates = Category::all();
        return view('auth.registration',compact("cates"));
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route("index");
        }
        // return redirect("login")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            $count1 = Post::count();
            $count2 = User::count();
            $count3 = Video::count();
            $count4 = Category::count();
            return view('backend.dashboard',compact('count1','count2','count3','count4'));
        }
        
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
    public function profile()
    {
        return view('backend.user.profile');
    }
    public function changeProfile(Request $request)
    {
        $user = User::find(Auth::id());

        $user->name = $request->name;
        // dd($request->all());
        if($request->password != null)
        {
            $data = $request->validate([
                'password' => 'required|confirmed|min:6'
            ],
            [
                'password.required' => 'Mật khẩu không khớp!!',
            ]);
            $user->password = Hash::make($data["password"]);
        }
        $user->save();
        return redirect()->back()->with("status","Cập nhật hồ sơ thành công");
    }
}