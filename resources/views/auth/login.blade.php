<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="laravel_demo, laravel-admin,nghiact">
	<meta name="Nghia" content="Tuan_nghia_pro">
	<meta name="keywords" content="web sale, lravel_sale, adminm-dashboard, pro-website">
    <base href="{{asset('')}}">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="resources/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Laravel_demo</title>

	<link href="resources/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Chào mừng bạn trở lại</h1>
							<p class="lead">
								Hãy đăng nhập ngay thôi nào !!!
							</p>
                            @if (session('tb'))
                                <div style="color:red;background-color:#FFFFCC;padding:10px;font-size:25px">
                                    {{ session('tb') }}
                                </div>
                            @endif
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="resources/img/avatars/avat.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form action="" method="post">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Điạ chỉ Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Nhập email của bạn" />
                                            @if($errors->has('email'))
                                                <div class="text-danger">{{$errors->first('email')}}</div>
                                            @endif
                                        </div>
										<div class="mb-3">
											<label class="form-label">Mật khẩu</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Nhập mật khẩu của bạn" />
                                            @if($errors->has('password'))
                                                <div class="text-danger">{{$errors->first('password')}}</div>
                                            @endif
                                            <small>
                                                <a href="#">Quên mật khẩu?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                                <span class="form-check-label">
                                                Nhớ tài khoản
                                                </span>
                                            </label>
										</div>
										<div class="text-center mt-3">
											<input type="submit" class="btn btn-lg btn-primary" value="Đăng nhập">
										</div>
									</form>
                                    <h5 class="text-center mt-3">or sign up with</h5>
                                    <div style="width:max-content;margin:10px auto">
                                        <a href="{{route('githublogin')}}" class="btn btn-link btn-floating mx-1 h4">
                                            <i class="bi bi-github"></i><span class=" nav-link">Github</span></a>

                                        <a href="{{route('googlelogin')}}" class="btn btn-link btn-floating mx-1 h4">
                                            <i class="bi bi-google"></i><span class="nav-link">Google</span></a>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small nav-link"><a href="{{route('register')}}">Chưa có tài khoản? <span class="text-danger text-fs-4">Đăng ký</span></a></div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="resources/js/app.js"></script>

</body>

</html>
