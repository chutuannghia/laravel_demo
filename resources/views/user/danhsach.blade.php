@extends('trangchu')

@section('title','Danh sách thể loại')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Danh Sách</h1>
    <div class="pt-2">
        <h4 class="text-secondary">Bảng Điều Khiển / <span class="text-warning">User</span></</h4></div>
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
                        <th>Tên</th>
                        <th>email</th>
                        <th>Nickname</th>
                        <th>avatar</th>
                        @if (Auth::user()->quyen==1)
                        <th colspan="2">Thao tác</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?$link ='resources/img/user/';?>
                @foreach($ds as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->nickname}}</td>
                        <td>
                            @if (strpos($user->avatar,'https:')===false)
                            <img src="resource/img/user/{{$user->avatar}}" alt="hinh" width="100" height="100">
                            @else
                            <img src="{{$user->avatar}}" alt="hinh" width="100" height="100">
                            @endif
                        </td>
                        @if (Auth::user()->quyen == 1)
                        <td align="center"><a href="{{route('suauser', $user->id)}}" class="btn btn-success">Sửa</a></td>
                        <td align="center"><a href="{{route('xoauser', $user->id)}}" class="btn btn-danger">Xoá</a></td>
                        @endif
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
