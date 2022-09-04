@extends('trangchu')

@section('title','Danh sách in tức')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Danh Sách</h1>
    <div class="pt-2">
        <h4 class="text-secondary">Bảng Điều Khiển / <span class="text-warning">Tin Tức</span></</h4></div>
    <div class="card mb-4">
        @if (session('tb'))
        <div class="text-center my-2 fs-2" style="color:red">
            {{ session('tb') }}
        </div>
        @endif
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Bảng Dữ Liệu
        </div>
        @foreach($ds as $tt)
        <div class="card-body">
            <h2 class="alert alert-warning">{{$tt->TieuDe}}</h2>
            <div class="row">
                <div class="col-md-3"><img src="resources/img/tintuc/{{$tt->Hinh}}" class="img-fluid" width="100%" alt="{{$tt->TieuDeKhongDau}}"></div>
                <div class="col-md-9"><h5>Tóm tắt</h5><p>{{$tt->TomTat}}</p></div>
            </div>
            <h5>Thể loại: <span class="text-primary">{{$tt->Ten}}</span></h5>
            <h5>Nội dung</h5>
            <p>{{$tt->NoiDung}}</p>
            <p>
                Nổi bật: <span class="text-primary h5">{{$tt->NoiBat}}</span> <br>
                Số lượt xem:<span class="text-primary h5">{{$tt->SoLuotXem}}</span> <br>

            </p>
            <div class="text-center mb-3">
                <a href="{{route('suatt', $tt->id)}}" class="btn btn-success" style="width:100px">Sửa</a>
                <a href="{{route('xoatt', $tt->id)}}" class="btn btn-danger" style="width:100px">Xoá</a>
            </div>
            <h3>ID Tin tức:{{$tt->id}}</h3>
            <hr class="my-2">
        </div>
        @endforeach
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center mb-4">
                {{ $ds->render('../vendor/pagination/paginator') }}
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
@endsection
