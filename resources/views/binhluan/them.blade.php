@extends('trangchu')

@section('title','Thêm thể loại')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Thêm bình luận Mới</h3>
                    @if (session('tb'))
                    <div class="alert alert-success fs-3">
                        {{ session('tb') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <div>Tên</div>
                                <select name="iduser" class="form-select">>
                                    @foreach ($dsuser as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <div>Tên</div>
                                <select name="idtieude" class="form-select">
                                    @foreach ($dstt as $tt)
                                        <option value="{{$tt->id}}">{{$tt->TieuDe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="noidung" type="text" placeholder="Nội dung " />
                                <label for="inputLastName">Nội dung</label>
                                @if($errors->has('noidung'))
                                    <div class="text-danger">{{$errors->first('noidung')}}</div>
                                 @endif
                            </div>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-block" name="luutru" value="Lưu Trữ">
                                <a class="btn btn-primary btn-warning px-3" href="{{route('dsbl')}}">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
