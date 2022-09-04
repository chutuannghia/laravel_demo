<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getRegister(){
        return view('auth.register');
    }
    public function postRegister(Request $request){
        $check = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|max:30',
            'repassword'=>'same:password'
        ],[
            'name.required'=>'Tên không thể đẻ trống',
            'email.required'=>'Email không thể để trống',
            'email.email'=>'Email Phải có @ . ',
            'password.required'=>'Mật khẩu không thể để trống',
            'password.min'=>'Mật khẩu chứa ít nhất 8 kí tự',
            'password.max'=>'Mật khẩu chứa nhiều nhất 30 kí tự',
            'repassword.same'=>'Xác nhận mật khẩu và mật khẩu phải giống nhau'
        ]);
        $user =  new User();
        $user->name=$check['name'];
        $user->email=$check['email'];
        $user->password = bcrypt($check['password']);
        $user->nickname = $check['name'];
        $user->avatar = "";
        $kq = $user->save();
        if($kq){
            return redirect()->route('login')->with('tb','Đăng ký thành công');
        }
        else{
            return redirect()->route('register')->with('tb','Đăng ký Không thành công');
        }
    }
    public function getLogin(){

        return view('auth.login');
    }
    public function postLogin(Request $request){
        $check = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:30',
        ],[
            'email.required'=>'Email không thể để trống',
            'email.email'=>'Email Phải có @ . ',
            'password.required'=>'Mật khẩu không thể để trống',
            'password.min'=>'Mật khẩu chứa ít nhất 8 kí tự',
            'password.max'=>'Mật khẩu chứa nhiều nhất 30 kí tự',
        ]);
        $email =$check['email'];
        $password = $check['password'];
        $user = User::where('email', $request->email)->first();
        if (Auth::attempt(['email' => $check["email"], "password" => $check["password"]]))
        {
            return redirect()->route("dashboard");
        }
        else {
            return redirect()->route("login")->with("tb", "Tên tài khoản hoặc mật khẩu không chính xác...");
        }
    }
    // Chú ý khi login với github hoặc google cấu trúc đường dân có kiểu
    //github : http://localhost:82/laravel_demo/auth/github/redirect
    public function githubredirect(Request $request)
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubcallback(Request $request)

    {
        $userdata = Socialite::driver('github')->user();
        $user = User::where('email', $userdata->email)->where('auth_type','github')->first();
        if($user)
        {
            // do login
            Auth::login($user);
        return redirect()->route('dashboard');
        }
        else
        {
            // do register
        $uuid = Str::uuid()->toString();

        $user =  new User();
        $user->nickname= $userdata->nickname;
        $user->name = $userdata->name;
        $user->email = $userdata->email;
        $user->avatar = $userdata->avatar;
        $user->password = Hash::make($uuid.now());
        $user->auth_type = 'github';
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
        }
    }


    // google : http://localhost:82/laravel_demo/auth/google/redirect
    // chú ý cấu trúc đường đẫn chính xác mới đăng nhập được do uri được khai báo trên google
    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)

    {
        $userdata = Socialite::driver('google')->user();
        $user = User::where('email', $userdata->email)->where('auth_type','google')->first();
        if($user)
        {
            // do login
            Auth::login($user);
        return redirect()->route('dashboard');
        }
        else
        {
            // do register
        $uuid = Str::uuid()->toString();

        $user =  new User();
        $user->nickname= ($userdata->nickname == "")?$userdata->name:$userdata->nickname;
        $user->name = $userdata->name;
        $user->email = $userdata->email;
        $user->avatar = $userdata->avatar;
        $user->password = Hash::make($uuid.now());
        $user->auth_type = 'google';
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    //Đổi mật khẩu
    public function getDoiMk(){
        return view('auth.doimk');
    }
    public function postDoiMK(Request $request){
        $check = $request->validate([
            'password1'=>'required|min:8|max:30',
            'password2'=>'required|min:8|max:30',
            'password3'=>'required|same:password2'
        ],[
            'password1.required'=>'Mật khẩu cũ không thể để trống',
            'password1.min'=>'Mật khẩu cũ chứa ít nhất 8 kí tự',
            'password1.max'=>'Mật khẩu cũ chứa nhiều nhất 30 kí tự',
            'password2.required'=>'Mật khẩu mới không thể để trống',
            'password2.min'=>'Mật khẩu mới chứa ít nhất 8 kí tự',
            'password2.max'=>'Mật khẩu mới chứa nhiều nhất 30 kí tự',
            'password3.required'=>' Xác nhận mật khẩu không thể để trống',
            'password3.same'=>' Xác nhận mật khẩu không khớp',
        ]);
        $password = $check['password1'];

        $user = User::where('id', Auth::user()->id)->first();
        if (Hash::check($password, $user->password))
        {
            $user->password = bcrypt($check['password2']);
            $user->save();
            return redirect()->route("dashboard");
        }
        else {
            return redirect()->route("doimk")->with("tb", "Mật khẩu cũ không chính xác.");
        }
    }
}
