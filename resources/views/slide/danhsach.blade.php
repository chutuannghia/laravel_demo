@extends('trangchu')

@section('title','Danh sách thể loại')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Danh Sách</h1>
    <div class="pt-2">
        <h4 class="text-secondary">Bảng Điều Khiển / <span class="text-warning">Slide</span></</h4></div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Bảng Dữ Liệu
        </div>
        @if (session('tb'))
            <div class="alert alert-warning text-center fs-2" style="color:red">
                {{ session('tb') }}
            </div>
        @endif
        <div class="card-body">
            @if (isset($ds[0]['id']))
            <table class="table text-center table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình</th>
                        <th>Nội dung</th>
                        <th>Links</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ds as $sl)
                    <tr>
                        <td>{{$sl->id}}</td>
                        <td>{{$sl->Ten}}</td>
                        <td><img src="resources/img/slide/{{$sl->Hinh}}" width="100" height="100" alt="hinh"></td>
                        <td>{{$sl->NoiDung}}</td>
                        <td>{{$sl->link}}</td>
                        <td align="center"><a href="{{route('suasl', $sl->id)}}" class="btn btn-success">Sửa</a></td>
                        <td align="center"><a href="{{route('xoasl', $sl->id)}}" class="btn btn-danger">Xoá</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-danger text-center">Nội dung silde Trống</div>
            @endif

        </div>
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
