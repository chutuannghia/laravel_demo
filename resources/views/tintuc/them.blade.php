@extends('trangchu')

@section('title','Thêm tin tức')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Thêm Tin tức</h3>
                </div>
                <div class="card-body">
                    @if (session('tb'))
                    <div class="text-center my-2 fs-2" style="color:red">
                        {{ session('tb') }}
                    </div>
                    @endif
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="my-3">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="tieude" type="text" placeholder="Nhập tiêu đề"/>
                                <label for="inputName">Tiêu đề</label>
                                @if($errors->has('tieude'))
                                    <div class="text-danger">{{$errors->first('tieude')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="tieudekhongdau" type="text" placeholder="Tiêu đề không dấu" />
                                <label for="inputLastName">Tiêu đề không dấu</label>
                                @if($errors->has('tieudekhongdau'))
                                    <div class="text-danger">{{$errors->first('tieudekhongdau')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="tomtat" type="text" placeholder="Tóm tắt" />
                                <label for="inputLastName">Tóm tắt</label>
                                @if($errors->has('tomtat'))
                                    <div class="text-danger">{{$errors->first('tomtat')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="noidung" type="text" placeholder="Nội dung" />
                                <label for="inputLastName">Nội dung</label>
                                @if($errors->has('noidung'))
                                    <div class="text-danger">{{$errors->first('noidung')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="hinh" type="file" placeholder="HÌnh" />
                                <label for="inputLastName">Chọn hình</label>
                                @if($errors->has('hinh'))
                                    <div class="text-danger">{{$errors->first('hinh')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="noibat" type="text" placeholder="Nổi bật" />
                                <label for="inputLastName">Nổi bật</label>
                                @if($errors->has('noibat'))
                                    <div class="text-danger">{{$errors->first('noibat')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="luotxem" type="text" placeholder="Số lượt xem" />
                                <label for="inputLastName">Số lượt xem</label>
                                @if($errors->has('luotxem'))
                                    <div class="text-danger">{{$errors->first('luotxem')}}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <div class="form-label h5">Loại tin</div>
                               <select class="form-select" name="loaitin">
                                    @foreach($dstl as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                               </select>                                @if($errors->has('loaitin'))
                                    <div class="text-danger">{{$errors->first('loaitin')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-block" name="luutru" value="Lưu Trữ">
                                <a class="btn btn-primary btn-warning px-3" href="{{route('dstt')}}">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
