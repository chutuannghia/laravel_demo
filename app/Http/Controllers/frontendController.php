<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Theloai;
use App\Models\Tintuc;
use App\Models\Loaitin;

class frontendController extends Controller
{
    public function trangchu(){
        $ds = Slide::all();
        $theloai = Theloai::all();
        return view('frontend.pages.trangchu',compact('ds','theloai'));
    }
    public function lienhe(){
        $ds = Slide::all();
        $theloai = Theloai::all();
        return view('frontend.pages.lienhe',compact('ds','theloai'));
    }
    public function gioithieu(){
        $ds = Slide::all();
        $theloai = Theloai::all();
        return view('frontend.pages.gioithieu',compact('ds','theloai'));
    }
    public function loaitin($id){
        $loaitin = Loaitin::find($id);
        $tintuc = Tintuc::where('idLoaitin',$id)->paginate(5);
        $theloai = Theloai::all();
        return view('frontend.pages.loaitin',compact('loaitin','tintuc','theloai'));
    }
    public function tintuc($id){
        $tintuc = Tintuc::find($id);
        $tinnoibat = Tintuc::where('NoiBat','=',1)->take(4)->get();
        $tinlienquan = Tintuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('frontend.pages.tintuc',compact('tinnoibat','tintuc','tinlienquan'));
    }
}
