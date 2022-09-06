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
            <div class="panel-body">
                <!-- item -->
                @foreach($theloai as $tl)
                @if((count($tl->Loaitin)>0) && (count($tl->Tintuc) > 0) )
                <div class="row-item row">
                <h3>
                <a href="#">{{$tl->Ten}}</a> |
                @foreach($tl->Loaitin as $lt)
                <small><a href="{{route('feloaitin', [$lt->id,$lt->TenKhongDau])}}"><i>{{$lt->Ten}}</i></a>/</small>
                @endforeach
                </h3>
                @php ($data = $tl->Tintuc->where("NoiBat","=",1)->sortByDesc('id')->take(5))
                @php ($tin1 = $data->shift())
                <div class="col-md-8 border-right">
                <div class="col-md-5">
                <a href="{{route('fetintuc',[$tin1->id, $tin1->TieuDeKhongDau])}}">
                @if (isset($tin1["Hinh"]))
                <img class="img-responsive" src="resources/img/tintuc/{{$tin1['Hinh']}}" alt="Hinh">
                @else
                <img class="img-responsive" src="resources/img/tintuc/{{$tin1['Hinh']}}" alt="Hinh">
                @endif
                </a>
                </div>
                <div class="col-md-7">
                <h3>{{isset($tin1['TieuDe'])? $tin1['TieuDe']:"....."}}</h3>
                <p>{{isset($tin1['TomTat'])? $tin1['TomTat']:"......"}}</p>
                <a class="btn btn-primary" href="{{route('fetintuc',[$tin1->id, $tin1->TieuDeKhongDau])}}">

                Chi Tiết
                <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                </div>
                </div>
                <div class="col-md-4">
                @foreach($data as $tt)
                <a href="{{route('fetintuc',[$tt->id, $tt->TieuDeKhongDau])}}">
                <h4>
                <span class="glyphicon glyphicon-list-alt"></span>
                {{isset($tt['TieuDe'])? $tt['TieuDe']:""}}
                </h4>
                </a>
                @endforeach
                </div>
                <div class="break"></div>
                </div>
                @endif
                <!-- end item -->
                @endforeach
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
