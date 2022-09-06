@extends('frontend.layout.master')
@section('noidung')
<div class="container">
    <div class="row main-left">
        <div class="col-md-3 ">
            @include('frontend.layout.menu_left')
        </div>
        <div class="col-md-9 ">
            <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;">
            <h4><b>{{isset($loaitin->Ten)?$loaitin->Ten:''}}</b></h4>
            </div>
            @foreach($tintuc as $tt)
            <div class="row-item row">
            <div class="col-md-3">
            <a href="{{route('fetintuc', [$tt->id,$tt->TieuDeKhongDau])}}"><br>
            <img width="200px" height="200px" class="img-responsive" src="resources/img/tintuc/{{$tt->Hinh}}"

            alt="Hình tin tức">
            </a>
            </div>
            <div class="col-md-9">
            <h3>{!!$tt->TieuDe!!}</h3>
            <p>{!!$tt->TomTat!!}</p>

            <a class="btn btn-primary" href="{{route('fetintuc', [$tt->id,$tt->TieuDeKhongDau])}}">Xem Thêm <span class="glyphicon glyphicon-chevron-
            right"></span></a>

            </div>
            <div class="break"></div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-center mb-4">
                    {{ $tintuc->render('../vendor/pagination/paginator') }}
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
