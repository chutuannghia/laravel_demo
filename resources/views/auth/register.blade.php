<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <title>Trang đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-secondary">
    <div class="container">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card mb-3" style="width: 100%">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="resources/img/login.jpg" class="img-fluid rounded-start" alt="register">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body bg-secondary bg-opacity-50">
                                <h1 class=" card-title text-center"><span style="font-size: 50px;color:red">Đ</span>ăng <span
                                        style="font-size: 50px;color:blueviolet">K</span>ý</h1>
                                <form class="forms-sample" action="" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Họ và tên</label>
                                        <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{$errors->first('name')}}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ Email</label>
                                        <input type="email" class="form-control" placeholder="Địa chỉ Email" name="email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Nhập mật khẩu">
                                            @if($errors->has('password'))
                                                <div class="text-danger">{{$errors->first('password')}}</div>
                                            @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" name="repassword"
                                            placeholder="Xác nhận mật khẩu">
                                            @if($errors->has('repassword'))
                                                <div class="text-danger">{{$errors->first('repassword')}}</div>
                                            @endif
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" value="Đăng ký" class="btn btn-primary me-2 mb-2 mb-md-0">
                                    </div>
                                    <a href="{{route('login')}}" class="d-block mt-3 text-muted fs-5 nav-link">Đã có tài khoản?
                                        <span class="text-danger">Đăng nhập</span></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
