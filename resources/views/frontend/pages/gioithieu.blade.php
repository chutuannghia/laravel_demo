@extends('frontend.layout.master')
@section('noidung')
<div class="container">

    <!-- slider -->
   @include('frontend.layout.carousel')
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
        <div class="col-md-3 ">
            @include('frontend.layout.menu_left')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                    <h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                   <div class="row  h3 text-center">
                    <div class="col-md-3">Họ và tên:</div>
                    <div class="col-md-9 text-danger">Chu tuấn nghĩa</div>
                   </div>
                   <div class="row text-center">
                    <div class="col-md-3">
                        <img src="https://lh3.googleusercontent.com/a/AItbvmkOgCeTqVxjEZdHvEGOLMBHXcr4hhZ2P8JNy-o-=s96-c" class="img-thumbnail" alt="hinh">
                    </div>
                    <div class="col-md-9 text-success" style="text-align:justify">Tôi sinh năm 1997 đến từ Bình Thuận. Vui tính hòa đồng chịu khó học hỏi.
                        <p>Hiện nay tôi có làm công việt thiết kế website với các dự án vừa và nhỏ với laravel(fullstack) và angular(frontend)
                            nếu có nhu cầu liên hệ rất mong được mọi người giúp đỡ thêm.
                        </p>
                    </div>
                   </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
