<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class slideController extends Controller
{
    public function dsSlide(){
        $ds = slide::paginate(10)->fragment('ds');
        return view('slide.danhsach',compact('ds'));
    }
    public function getThemSlide(){
        return view('slide.them');
    }
    public function postThemSlide(Request $request){
        $check =  $request->validate([
            'ten'=>'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:2048',
            'noidung'=>'required',
            'link'=>'required'
        ],[
            'ten.required'=>'Tên không thể để trống',
            'link.required'=>'Link không thể để trống',
            'noidung.required'=>'Nội dung không thể để trống',
            'hinh.required'=>'Hình đề không thể để trống',
            'hinh.image'=>'Thể loại file phải là hình ảnh',
            'hinh.mimes' => 'Phần mở rông chỉ hỗ trợ jpeg,png,jpg,gif',
            'hinh.max'=>'kích thước file tối đa là 2mb',
            'hinh.file'=>'Dữ liệu phải là file được tải lên',
       ]);
       $gt = Slide::where('Ten',$check['ten'])->get();
        $sl = new Slide();
        if($check['hinh'] && !isset($gt[0]['Ten'])){
            $hinh = $request->file('hinh');
            $name =$check['hinh']->getClientOriginalName();
            if(File::exists("resources/img/slide/$name")) {
                return redirect()->route('themsl')->with('tb','Hình ảnh đã tồn tại');
            }
            else{
                $up = $hinh->move('resources/img/slide',$name);
                if($up)
                {
                    $sl->Hinh = $name;
                    $sl->Ten = $check['ten'];
                    $sl->NoiDung = $check['noidung'];
                    $sl->link = $check['link'];
                    $kq = $sl->save();
                    if($kq){
                        return redirect()->route('dssl')->with('tb','Thêm thành công!!!');
                    }
                    else
                        return redirect()->route('themsl')->with('tb','Thêm không thành công!!!');
                }
                else
                return redirect()->route('themsl')->with('tb','Thêm không thành công.Do file upload không được');
            }
        }
        else
        return redirect()->route('themsl')->with('tb','Thêm không thành . Tiêu đề Tin tức đã tồn tại');
    }
    public function getSuaSlide($id){
        $sl = Slide::where('id','=',$id)->get();
        return view('slide.sua',compact('sl'));
    }
    public function postSuaSlide( Request $request ,$id){
        $check =  $request->validate([
            'ten'=>'required',
            'noidung'=>'required',
            'link'=>'required'
        ],[
            'ten.required'=>'Tên không thể để trống',
            'link.required'=>'Link không thể để trống',
            'noidung.required'=>'Nội dung không thể để trống',
       ]);
       $sl1 = Slide::where('id',$id)->get();
        $imgold = $sl1[0]['Hinh'];
        if($request->hasFile('hinh')){
        $name = $request['hinh']->getClientOriginalName();
        }
        else{
            $name = $imgold;
        }
        $hinh = $request->file('hinh');
        $gt = Slide::where('Ten',$check['ten'])->get();
        $sl = Slide::find($id);
        if(!isset($gt[0]['Ten'])|| $gt[0]['Ten'] == $check['ten']){
            if(File::exists("resources/img/slide/$name")&&$name != $imgold) {
                return redirect()->route('suasl',$id)->with('tb','Hình ảnh đã tồn tại');
            }
            else{
                if($hinh){
                    $up = $hinh->move('resources/img/slide',$name);
                }
                else{
                    $up = false;
                }
                if($up || $name ==$imgold)
                {
                    $sl->Hinh = $name;
                    $sl->Ten = $check['ten'];
                    $sl->NoiDung = $check['noidung'];
                    $sl->link = $check['link'];
                    $kq = $sl->save();
                    if($kq){
                        if($name != $imgold){
                            if (File::exists("resources/img/slide/$imgold")) {
                                File::delete("resources/img/slide/$imgold");
                            }
                        }
                        return redirect()->route('dssl')->with('tb','Sửa thành công!!!');
                    }
                    else
                        return redirect()->route('suasl',$id)->with('tb','Sửa không thành công!!!');
                }
                else
                return redirect()->route('suasl',$id)->with('tb','Sửa không thành công.Do file upload không được');
            }
        }
        else
        return redirect()->route('suasl',$id)->with('tb','Sửa không thành . Tiêu đề Tin tức đã tồn tại');
    }
    public function getXoaSlide($id){
        $tt1 = Slide::where('id',$id)->get();
        $imgold = $tt1[0]['Hinh'];
        $kq = Slide::where('id','=',$id)->delete();
        if($kq){
            if (File::exists("resources/img/slide/$imgold")) {
                File::delete("resources/img/slide/$imgold");
            }
            return redirect()->route('dssl')->with('tb','Xóa thành công');
        }
        else
        return redirect()->route('dssl')->with('tb','Xóa không thành công');
    }
}
