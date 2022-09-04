@extends('trangchu')

@section('title','Danh sách thể loại')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Danh Sách</h1>
    <div class="pt-2">
        <h4 class="text-secondary">Bảng Điều Khiển / <span class="text-warning">Bình luận</span></</h4></div>
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
            <table class="table text-center table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Tin tức</th>
                        <th>Nội dung</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ds as $cm)
                    <tr>
                        <td>{{$cm->id}}</td>
                        <td>{{$cm->Users->name}}</td>
                        <td>{{$cm->Tintuc->TieuDe}}</td>
                        <td>{{$cm->NoiDung}}</td>
                        <td align="center"><a href="{{route('suabl', $cm->id)}}" class="btn btn-success">Sửa</a></td>
                        <td align="center"><a href="{{route('xoabl', $cm->id)}}" class="btn btn-danger">Xoá</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
