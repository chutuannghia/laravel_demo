<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tintuc;

class binhluanController extends Controller
{
    public function dsBinhLuan(){
        $ds = Comment::paginate(10)->fragment('ds');
        return view('binhluan.danhsach',compact('ds'));
    }
    public function getThemBinhLuan(){
        $dsuser = User::select('id','name')->get();
        $dstt = Tintuc::select('id','TieuDe')->get();
        return view('binhluan.them',compact('dstt','dsuser'));
    }
    public function postThemBinhLuan(Request $request){
        $check =  $request->validate([
            'iduser'=>'required',
            'idtieude'=>'required',
            'noidung'=>'required'
        ],[
            'iduser.required'=>'Tên không thể để trống',
            'idtieude.required'=>'Tin tức không thể để trống',
            'noidung.required'=>'Nội dung không thể để trống',
       ]);
        $cm = new Comment();
        $cm->idUser = $check['iduser'];
        $cm->idTinTuc = $check['idtieude'];
        $cm->NoiDung = $check['noidung'];
        $kq = $cm->save();
        if($kq){
            return redirect()->route('dsbl')->with('tb','Thêm thành công!!!');
        }
        else
        return redirect()->route('dsbl')->with('tb','Thêm không thành công!!!');
    }
    public function getSuaBinhLuan($id){
        $cm = Comment::where('id','=',$id)->get();
        $dsuser = User::select('id','name')->get();
        $dstt = Tintuc::select('id','TieuDe')->get();
        return view('binhluan.sua',compact('cm','dsuser','dstt'));
    }
    public function postSuaBinhLuan( Request $request ,$id){
        $check =  $request->validate([
            'iduser'=>'required',
            'idtieude'=>'required',
            'noidung'=>'required'
        ],[
            'iduser.required'=>'Tên không thể để trống',
            'idtieude.required'=>'Tin tức không thể để trống',
            'noidung.required'=>'Nội dung không thể để trống',
       ]);
        $cm = Comment::find($id);
        $cm->idUser = $check['iduser'];
        $cm->idTinTuc = $check['idtieude'];
        $cm->NoiDung = $check['noidung'];
        $kq = $cm->save();
        if($kq){
            return redirect()->route('dsbl')->with('tb','Sửa thành công!!!');
        }
        else
        return redirect()->route('dsbl')->with('tb','Sửa không thành công!!!');
    }
    public function getXoaBinhLuan($id){
        $kq = comment::where('id','=',$id)->delete();
        if($kq){
            return redirect()->route('dsbl')->with('tb','Xóa thành công');
        }
        else
        return redirect()->route('dsbl')->with('tb','Xóa không thành công');
    }
}
