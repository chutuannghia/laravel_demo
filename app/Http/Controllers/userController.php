<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class userController extends Controller
{
    public function dsUser(){
        $ds = User::paginate(10)->fragment('ds');
        return view('User.danhsach',compact('ds'));
    }
    public function getThemUser(){
        return view('user.them');
    }
    public function postThemUser(Request $request){
        $check =  $request->validate([
            'name'=>'required',
            'email'=>'required',
            'quyen'=>'required|numeric',
            'password'=>'required|min:8|max:30'
        ],[
            'name.required'=>'Tên không thể để trống',
            'email.required'=>'Email không thể để trống',
            'quyen.required'=>'Quyền không thể để trống',
            'quyen.numeric'=>'Quyền phải là số nguyên',
            'password.required'=>'Mật khẩu không thể để trống',
            'password.min'=>'Mật khẩu chứa ít nhất 8 ký tự',
            'password.max'=>'Mật khẩu chứa nhiều nhất 30 ký tự'
       ]);
       $user = new User();
       $user->name = $check['name'];
       $user->email = $check['email'];
       $user->quyen = $check['quyen'];
       $user->nickname = $check['name'];
       $user->avatar = '';
       $user->password = Hash::make($check['password']);
       $kq = $user->save();
       if($kq){
        return redirect()->route('dsuser')->with('tb','Thêm thành công');
       }
       else{
        return redirect()->route('dsuser')->with('tb','Thêm Không thành công');
       }
    }
    public function getSuaUser($id){
        $user = User::where('id','=',$id)->get();
        return view('user.sua',compact('user'));
    }
    public function postSuaUser( Request $request ,$id){
        $user = User::where('id','=',$id)->get();
        $check =  $request->validate([
            'name'=>'required',
            'email'=>'required',
            'quyen'=>'required|numeric',
        ],[
            'name.required'=>'Tên không thể để trống',
            'email.required'=>'Email không thể để trống',
            'quyen.required'=>'Quyền không thể để trống',
            'quyen.numeric'=>'Quyền phải là số nguyên',
       ]);
       if($request['password' == '']){
        $password = $user[0]['password'];
       }
       else
       {
        $password = Hash::make($request['password']);
       }
       $user =User::find($id);
       $user->name = $check['name'];
       $user->email = $check['email'];
       $user->quyen = $check['quyen'];
       $user->nickname = $check['name'];
       $user->avatar = '';
       $user->password = $password;
       $kq = $user->save();
       if($kq){
        return redirect()->route('dsuser')->with('tb','Sửa thành công');
       }
       else{
        return redirect()->route('dsuser')->with('tb','Sửa Không thành công');
       }
    }
    public function getXoaUser($id){
        $tt1 = User::where('id',$id)->get();
        $imgold = $tt1[0]['avatar'];
        $kq = User::where('id','=',$id)->delete();
        if($kq){
            if (File::exists("resources/img/user/$imgold")) {
                File::delete("resources/img/user/$imgold");
            }
            return redirect()->route('dsuser')->with('tb','Xóa thành công');
        }
        else
        return redirect()->route('dsuser')->with('tb','Xóa không thành công');
    }
}
