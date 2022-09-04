<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loaitin;
use App\Models\Theloai;
class loaitinController extends Controller
{
    public function dsLoaiTin(){
        $ds = Loaitin::paginate(10)->fragment('ds');
        return view('loaitin.danhsach',compact('ds'));
    }
    public function getThemLoaiTin(){
        $ds = theloai::all();
        return view('loaitin.them',compact('ds'));
    }
    public function postThemLoaiTin(Request $request){
        $check =  $request->validate([
            'name'=>'required',
            'tenkhongdau'=>'required',
            'idtheloai'=>'required'
        ],[
            'name.required'=>'Tên không thể để trống',
            'tenkhongdau.required'=>'Tên không dấu không thể để trống',
            'idtheloai.required'=>'ID loại tin không thể để trống',
       ]);
        $lt = new Loaitin();
        $lt->Ten = $check['name'];
        $lt->TenKhongDau = $check['tenkhongdau'];
        $lt->idTheLoai = $check['idtheloai'];
        $kq = $lt->save();
        if($kq){
            return redirect()->route('dslt')->with('tb','Thêm thành công!!!');
        }
        else
        return redirect()->route('dslt')->with('tb','Thêm không thành công!!!');
    }
    public function getSuaLoaiTin($id){
        $lt = Loaitin::where('id','=',$id)->get();
        $ds = Theloai::all();
        return view('loaitin.sua',compact('lt','ds'));
    }
    public function postSuaLoaiTin( Request $request ,$id){
        $check =  $request->validate([
            'name'=>'required',
            'tenkhongdau'=>'required'
        ],[
            'name.required'=>'Tên không thể để trống',
            'tenkhongdau.required'=>'Tên không dấu không thể để trống'
       ]);
        $kq = LoaiTin::find($id);
        $kq->Ten = $check['name'];
        $kq->TenKhongDau = $check['tenkhongdau'];
        $kq = $kq->save();
        if($kq){
            return redirect()->route('dslt')->with('tb','Sửa thành công');
        }
        else
        return redirect()->route('dslt')->with('tb','Sửa không thành công');
    }
    public function getXoaLoaiTin($id){
        $kq = Loaitin::where('id','=',$id)->delete();
        if($kq){
            return redirect()->route('dslt')->with('tb','Xóa thành công');
        }
        else
        return redirect()->route('dslt')->with('tb','Xóa không thành công');
    }
}
