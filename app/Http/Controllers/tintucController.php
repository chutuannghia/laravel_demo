<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tintuc;
use Illuminate\Support\Facades\File;
use App\Models\Loaitin;

class tintucController extends Controller
{
    public function dsTinTuc(){
        $ds = Tintuc::paginate(10)->fragment('ds');
        return view('tintuc.danhsach',compact('ds'));
    }
    public function getThemTinTuc(){
        $dstl = Loaitin::get(['Ten','id']);
        return view('tintuc.them',compact('dstl'));
    }
    public function postThemTinTuc(Request $request){
        $check =  $request->validate([
            'tieude'=>'required',
            'tieudekhongdau'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:2048',
            'noidung'=>'required',
            'noibat'=>'required|numeric|min:0|max:1',
            'luotxem'=>'required|numeric',
        ],[
            'tieude.required'=>'Tiêu đề không thể để trống',
            'tieudekhongdau.required'=>'tiêu đề không dấu không thể để trống',
            'tomtat.required'=>'Tóm tắt không thể để trống',
            'noidung.required'=>'Nội dung không thể để trống',
            'hinh.required'=>'Hình đề không thể để trống',
            'hinh.image'=>'Thể loại file phải là hình ảnh',
            'hinh.mimes' => 'Phần mở rông chỉ hỗ trợ jpeg,png,jpg,gif',
            'hinh.max'=>'kích thước file tối đa là 2mb',
            'noibat.required'=>'Nổi bật không thể để trống',
            'luotxem.required'=>'Số lượt xem không thể để trống',
            'luotxem.numerric'=>'Số lượt xem phải là số',
            'noibat.numeric'=>'Nổi bật phải là số',
            'noibat.min'=>'Nổi bật chỉ có thể thằng 0 hoặc 1',
            'noibat.max'=>'Nổi bật chỉ có thể thằng 0 hoặc 1',
            'hinh.file'=>'Dữ liệu phải là file được tải lên',

       ]);
       $gt = Tintuc::where('TieuDe',$check['tieude'])->get();
        $tt = new Tintuc();
        if($check['hinh'] && !isset($gt[0]['TieuDe'])){
            $hinh = $request->file('hinh');
            $name = $check['hinh']->getClientOriginalName();
            if(File::exists("resources/img/tintuc/$name")) {
                return redirect()->route('themtt')->with('tb','Hình ảnh đã tồn tại');
            }
            else{
                $up = $hinh->move('resources/img/tintuc',$name);
                if($up)
                {
                    $tt->Hinh = $name;
                    $tt->TieuDe = $check['tieude'];
                    $tt->TieuDeKhongDau = $check['tieudekhongdau'];
                    $tt->TomTat = $check['tomtat'];
                    $tt->NoiDung = $check['noidung'];
                    $tt->NoiBat = $check['noibat'];
                    $tt->SoLuotXem = $check['luotxem'];
                    $tt->idLoaiTin = $request['loaitin'];
                    $kq = $tt->save();
                    if($kq){
                        return redirect()->route('dstt')->with('tb','Thêm thành công!!!');
                    }
                    else
                        return redirect()->route('themtt')->with('tb','Thêm không thành công!!!');
                }
                else
                return redirect()->route('themtt')->with('tb','Thêm không thành công.Do file upload không được');
            }
        }
        else
        return redirect()->route('themtt')->with('tb','Thêm không thành . Tiêu đề Tin tức đã tồn tại');
    }
    public function getSuaTinTuc($id){
        $tt = TinTuc::where('id',$id)->get();
        $dstl = Loaitin::get(['Ten','id']);
        return view('tintuc.sua',compact('tt','dstl'));
    }
    public function postSuaTinTuc( Request $request ,$id){
        $check =  $request->validate([
            'tieude'=>'required',
            'tieudekhongdau'=>'required',
            'tomtat'=>'required',
            'noidung'=>'required',
            'noidung'=>'required',
            'noibat'=>'required|numeric|min:0|max:1',
            'luotxem'=>'required|numeric',
        ],[
            'tieude.required'=>'Tiêu đề không thể để trống',
            'tieudekhongdau.required'=>'tiêu đề không dấu không thể để trống',
            'tomtat.required'=>'Tóm tắt không thể để trống',
            'noidung.required'=>'Nội dung không thể để trống',
            'noibat.required'=>'Nổi bật không thể để trống',
            'luotxem.required'=>'Số lượt xem không thể để trống',
            'luotxem.numerric'=>'Số lượt xem phải là số',
            'noibat.numeric'=>'Nổi bật phải là số',
            'noibat.min'=>'Nổi bật chỉ có thể thằng 0 hoặc 1',
            'noibat.max'=>'Nổi bật chỉ có thể thằng 0 hoặc 1',

       ]);
       $gt = Tintuc::where('TieuDe',$check['tieude'])->get();
       $tt1 = TinTuc::where('id',$id)->get();
        $tt = TinTuc::find($id);
        $imgold = $tt1[0]['Hinh'];
        if(!isset($gt->TieuDe) || ($gt->TieuDe ==  $check['tieude'])){
            if($request->hasFile('hinh')){
                $name = $request['hinh']->getClientOriginalName();
            }
            else{
                $name = $imgold;
            }
            $hinh = $request->file('hinh');
            if(File::exists("resources/img/tintuc/$name") && ($imgold != $name)) {
                return redirect()->route('dstt')->with('tb','Hình ảnh đã tồn tại');
            }
            else{
                if($hinh){
                    $up = $hinh->move('resources/img/tintuc',$name);
                }
                else
                {
                    $up = false;
                }
                if($up || $name == $imgold)
                {
                    $tt->Hinh = $name;
                    $tt->TieuDe = $check['tieude'];
                    $tt->TieuDeKhongDau = $check['tieudekhongdau'];
                    $tt->TomTat = $check['tomtat'];
                    $tt->NoiDung = $check['noidung'];
                    $tt->NoiBat = $check['noibat'];
                    $tt->SoLuotXem = $check['luotxem'];
                    $tt->idLoaiTin = $request['loaitin'];
                    $kq = $tt->save();
                    if($kq){
                        if($name != $imgold){
                            if (File::exists("resources/img/tintuc/$imgold")) {
                                File::delete("resources/img/tintuc/$imgold");
                            }
                        }
                        return redirect()->route('dstt')->with('tb','Sửa thành công!!!');
                    }
                    else
                        return redirect()->route('dstt')->with('tb','Sửa không thành công!!!');
                }
                else
                return redirect()->route('dstt')->with('tb','Sửa không thành công.Do file upload không được');
            }
        }
        else
        return redirect()->route('dstt')->with('tb','Sửa không thành . Tiêu đề Tin tức đã tồn tại, hoặc anh lỗi');
    }
    public function getXoaTinTuc($id){
        $tt1 = TinTuc::where('id',$id)->get();
        $imgold = $tt1[0]['Hinh'];
        $kq = TinTuc::where('id','=',$id)->delete();
        if($kq){
            if (File::exists("resources/img/tintuc/$imgold")) {
                File::delete("resources/img/tintuc/$imgold");
            }
            return redirect()->route('dstt')->with('tb','Xóa thành công');
        }
        else
        return redirect()->route('dstt')->with('tb','Xóa không thành công');
    }
}
