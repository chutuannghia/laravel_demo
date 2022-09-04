@extends('trangchu')

@section('title','Thêm thể loại')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Sửa user</h3>
                    @if (session('tb'))
                    <div class="alert alert-success fs-3" style="color:red">
                        {{ session('tb') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Nhập tên người dùng" value="{{isset($user[0]['name'])?$user[0]['name']:''}}"/>
                                <label for="inputName">Họ và tên</label>
                                @if($errors->has('name'))
                                <div class="text-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="email" type="email" placeholder="Điạ chỉ email" value="{{isset($user[0]['email'])?$user[0]['email']:''}}"/>
                                <label for="inputLastName">Địa chỉ email </label>
                                @if($errors->has('email'))
                                    <div class="text-danger">{{$errors->first('email')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="quyen" type="text" placeholder="quyền" value="{{isset($user[0]['quyen'])?$user[0]['quyen']:''}}"/>
                                <label for="inputLastName">Quyền</label>
                                @if($errors->has('quyen'))
                                    <div class="text-danger">{{$errors->first('quyen')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="password" type="password" placeholder="mật khẩu"/>
                                <label for="inputLastName">Mật khẩu</label>
                                @if($errors->has('password'))
                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                 @endif
                            </div>

                        </div>

                        <div class="mt-4 mb-0">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-block" name="luutru" value="Lưu Trữ">
                                <a class="btn btn-primary btn-warning px-3" href="{{route('dsuser')}}">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
