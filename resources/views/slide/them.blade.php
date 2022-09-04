@extends('trangchu')

@section('title','Thêm thể loại')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Thêm slide Mới</h3>
                    @if (session('tb'))
                    <div class="alert alert-success fs-3 text-center" style="color:red">
                        {{ session('tb') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating my-3">
                                <input class="form-control" name="ten" type="text" placeholder="Nhập tên" />
                                <label for="inputLastName">Tên</label>
                                @if($errors->has('ten'))
                                    <div class="text-danger">{{$errors->first('ten')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="hinh" type="file" />
                                <label for="inputLastName">Chọn hình</label>
                                @if($errors->has('hinh'))
                                    <div class="text-danger">{{$errors->first('hinh')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="noidung" type="text" placeholder="Nội dung " />
                                <label for="inputLastName">Nội dung</label>
                                @if($errors->has('noidung'))
                                    <div class="text-danger">{{$errors->first('noidung')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="link" type="text" placeholder="Link" />
                                <label for="inputLastName">Link</label>
                                @if($errors->has('link'))
                                    <div class="text-danger">{{$errors->first('link')}}</div>
                                 @endif
                            </div>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-block" name="luutru" value="Lưu Trữ">
                                <a class="btn btn-primary btn-warning px-3" href="{{route('dssl')}}">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
