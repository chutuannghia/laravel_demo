<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class theloaiController extends Controller
{
    public function dsTheLoai(){
        $ds = Theloai::paginate(10)->fragment('ds');
        return view('theloai.danhsach',compact('ds'));
    }
    public function getThemTheLoai(){
        return view('theloai.them');
    }
    public function postThemTheLoai(Request $request){
        $check =  $request->validate([
            'name'=>'required',
            'tenkhongdau'=>'required'
        ],[
            'name.required'=>'Tên không thể để trống',
            'tenkhongdau.required'=>'Tên không dấu không thể để trống'
       ]);
        $tl = new Theloai();
        $tl->Ten = $check['name'];
        $tl->TenKhongDau = $check['tenkhongdau'];
        $kq = $tl->save();
        if($kq){
            return redirect()->route('dstheloai')->with('tb','Thêm thành công!!!');
        }
        else
        return redirect()->route('dstheloai')->with('tb','Thêm không thành công!!!');
    }
    public function getSuaTheLoai($id){
        $tl = TheLoai::where('id','=',$id)->get();
        return view('theloai.sua',compact('tl'));
    }
    public function postSuaTheLoai( Request $request ,$id){
        $check =  $request->validate([
            'name'=>'required',
            'tenkhongdau'=>'required'
        ],[
            'name.required'=>'Tên không thể để trống',
            'tenkhongdau.required'=>'Tên không dấu không thể để trống'
       ]);
        $kq = TheLoai::find($id);
        $kq->Ten = $check['name'];
        $kq->TenKhongDau = $check['tenkhongdau'];
        $kq = $kq->save();
        if($kq){
            return redirect()->route('dstheloai')->with('tb','Sửa thành công');
        }
        else
        return redirect()->route('dstheloai')->with('tb','Sửa không thành công');
    }
    public function getXoaTheLoai($id){
        $kq = TheLoai::where('id','=',$id)->delete();
        if($kq){
            return redirect()->route('dstheloai')->with('tb','Xóa thành công');
        }
        else
        return redirect()->route('dstheloai')->with('tb','Xóa không thành công');
    }
}
