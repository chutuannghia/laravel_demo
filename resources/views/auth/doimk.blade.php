@extends('trangchu')

@section('title','Đổi mật khẩu')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-danger text-center h3">Đổi mật khẩu</div>
            <div class="card">
                <div class="card-body">
                    @if (session('tb'))
                    <div style="color:red;background-color:#FFFFCC;padding:10px;font-size:25px">
                        {{ session('tb') }}
                    </div>
                    @endif
                    <div class="m-sm-4">
                        <div class="text-center">
                            <img src="resources/img/avatars/avat.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu cũ</label>
                                <input class="form-control form-control-lg" type="password" name="password1" placeholder="Nhập mật khẩu cũ" />
                                @if($errors->has('password1'))
                                    <div class="text-danger">{{$errors->first('password1')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu mới</label>
                                <input class="form-control form-control-lg" type="password" name="password2" placeholder="Nhập mật khẩu mới" />
                                @if($errors->has('password2'))
                                    <div class="text-danger">{{$errors->first('password2')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <input class="form-control form-control-lg" type="password" name="password3" placeholder="Xác nhận mật khẩu" />
                                @if($errors->has('password3'))
                                    <div class="text-danger">{{$errors->first('password3')}}</div>
                                @endif
                            </div>
                            <div class="text-center mt-3">
                                <input type="submit" class="btn btn-lg btn-primary" value="Cập nhật">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
