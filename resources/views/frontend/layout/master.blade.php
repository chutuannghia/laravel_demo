<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Quản lý tin tức</title>
<base href="{{asset('')}}">
<!-- Bootstrap Core CSS -->
<link href="resources/frontend/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="resources/frontend/css/shop-homepage.css" rel="stylesheet">
<link href="resources/frontend/css/my.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
@include("frontend/layout/header")
@yield("noidung")
@include("frontend/layout/footer")
<!-- jQuery -->
<script src="resources/frontend/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="resources/frontend/js/bootstrap.min.js"></script>
<script src="resources/frontend/js/my.js"></script>
</body>
</html>
