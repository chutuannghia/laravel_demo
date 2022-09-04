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

	<title>@yield('title')</title>

	<link href="resources/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{route('dashboard')}}">
                    <span class="align-middle">Laravel_demo</span>
                </a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Danh mục
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{route('dashboard')}}">
                             <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Bảng điều khiển</span>
                         </a>
					</li>
					<li class="sidebar-item my-0">
						<a class="sidebar-link collapsed py-0 text-warning" data-bs-toggle="collapse" data-bs-target="#theloai" aria-expanded="false" aria-controls="collapseLayouts">
                            Thể Loại
                        </a>
                        <div class="collapse" id="theloai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sidebar">
                                <a class="sidebar-link" href="{{route('dstheloai')}}">Danh Sách</a>
                                <a class="sidebar-link" href="{{route('themtl')}}">Thêm</a>
                            </nav>
                        </div>
					</li>
                    <li class="sidebar-item my-2">
						<a class="sidebar-link collapsed py-0 text-warning" href="#" data-bs-toggle="collapse" data-bs-target="#tintuc" aria-expanded="false" aria-controls="collapseLayouts">
                            Tin tức
                        </a>
                        <div class="collapse" id="tintuc" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sidebar">
                                <a class="sidebar-link" href="{{route('dstt')}}">Danh Sách</a>
                                <a class="sidebar-link" href="{{route('themtt')}}">Thêm</a>
                            </nav>
                        </div>
					</li>
                    <li class="sidebar-item my-2">
						<a class="sidebar-link collapsed py-0 text-warning" href="#" data-bs-toggle="collapse" data-bs-target="#loaitin" aria-expanded="false" aria-controls="collapseLayouts">
                            Loại tin
                        </a>
                        <div class="collapse" id="loaitin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sidebar">
                                <a class="sidebar-link" href="{{route('dslt')}}">Danh Sách</a>
                                <a class="sidebar-link" href="{{route('themlt')}}">Thêm</a>
                            </nav>
                        </div>
					</li>
                    <li class="sidebar-item my-0">
						<a class="sidebar-link collapsed py-0 text-warning" href="#" data-bs-toggle="collapse" data-bs-target="#comment" aria-expanded="false" aria-controls="collapseLayouts">
                            Bình luận
                        </a>
                        <div class="collapse" id="comment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sidebar">
                                <a class="sidebar-link" href="{{route('dsbl')}}">Danh Sách</a>
                                <a class="sidebar-link" href="{{route('thembl')}}">Thêm</a>
                            </nav>
                        </div>
					</li>
                    <li class="sidebar-item my-0">
						<a class="sidebar-link collapsed py-0 text-warning" href="#" data-bs-toggle="collapse" data-bs-target="#slide" aria-expanded="false" aria-controls="collapseLayouts">
                            Slide
                        </a>
                        <div class="collapse" id="slide" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sidebar">
                                <a class="sidebar-link" href="{{route('dssl')}}">Danh Sách</a>
                                <a class="sidebar-link" href="{{route('themsl')}}">Thêm</a>
                            </nav>
                        </div>
					</li>                    <li class="sidebar-item my-0">
						<a class="sidebar-link collapsed py-0 text-warning" href="#" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false" aria-controls="collapseLayouts">
                            user
                        </a>
                        <div class="collapse" id="user" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sidebar">
                                <a class="sidebar-link" href="{{route('dsuser')}}">Danh Sách</a>
                                @if(Auth::user()->quyen == 1)
                                <a class="sidebar-link" href="{{route('themuser')}}">Thêm</a>
                                @endif
                            </nav>
                        </div>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Thiết kế website</strong>
						<div class="mb-3 text-sm">
							Liên hệ ngay chúng tôi:
						</div>
						<div class="d-grid">
							<a href="mailto:chutuannghia97@gmail.com" class="btn btn-primary">Tuấn nghĩa</a>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 Thông báo mới
								</div>
								<div class="list-group">
									<a href="#!" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Cập nhật thánh công</div>
												<div class="text-muted small mt-1">Hoàn thành xác minh tài khoản</div>
												<div class="text-muted small mt-1">13 ngày</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">sao phải xoắn</div>
												<div class="text-muted small mt-1">đã cập nhật một trạng thái mới</div>
												<div class="text-muted small mt-1">2h trước</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">bé mít ướt</div>
												<div class="text-muted small mt-1">5h trước</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Thông báo mới</div>
												<div class="text-muted small mt-1">sắp tới lễ sale ngập tràn</div>
												<div class="text-muted small mt-1">14h trước</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#!" class="text-muted">xem tất cả thông báo</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#!" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										5 Tin nhắn mới
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="resources/img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Họp lớp sắp tới bạn tham gia chứ</div>
												<div class="text-muted small mt-1">15m trước</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="resources/img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Làm quen nha!</div>
												<div class="text-muted small mt-1">2h trước</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="resources/img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Tôi thấy bạn thật tuyệt</div>
												<div class="text-muted small mt-1">4h trước</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="resources/img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Đi chơi không bạn</div>
												<div class="text-muted small mt-1">5h trước</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#!" class="text-muted">Xem tất cả tin nhắn</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                            </a>
                            <?php $avatar = 'resources/img/avatars/ava1.jpg';?>
                            @if(Auth::check())
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                    <img src="{{Auth::user()->avatar?(Auth::user()->avatar):$avatar}}"
                                    class="avatar img-fluid rounded me-1" alt="{{Auth::user()->name}}" /> <span class="text-dark">{{Auth::user()->name}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @if(Auth::user()->auth_type == 'email')
                                    <a class="dropdown-item" href="{{route('doimk')}}"><i class="align-middle me-1" data-feather="user"></i>Đổi mật khẩu</a>
                                    @endif
                                    <a class="dropdown-item" href="mailto:chutuannghia@gmail.com"><i class="align-middle me-1" data-feather="help-circle"></i>Trợ giúp</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                                </div>
                            @endif
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="mailto:chutuannghia97@gmail.com" target="_blank"><strong>Nghia</strong></a> - <a class="text-muted" href="" target="_blank"><strong>Thực hiện 2022</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="mailto:chutuannghia97@gmail.com" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="mailto:chutuannghia97@gmail.com" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="mailto:chutuannghia97@gmail.com" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="mailto:chutuannghia97@gmail.com" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="resources/js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>
