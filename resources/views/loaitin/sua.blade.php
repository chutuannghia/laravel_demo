@extends('trangchu')

@section('title','Sửa thể loại')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Sửa loại tin</h3>
                </div>
                <div class="card-body">
                    @if (session('tb'))
                    <div style="color:green;background-color:#FFFFCC;padding:10px;font-size:25px">
                        {{ session('tb') }}
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Nhập tên thể loại" value="{{isset($lt[0]['Ten'])?$lt[0]['Ten']:''}}"/>
                                <label for="inputName">Tên</label>
                                @if($errors->has('name'))
                                    <div class="text-danger">{{$errors->first('name')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="tenkhongdau" type="text" placeholder="Tên không dấu" value="{{isset($lt[0]['TenKhongDau'])?$lt[0]['TenKhongDau']:''}}"/>
                                <label for="inputLastName">Tên Không dấu</label>
                                @if($errors->has('tenkhongdau'))
                                    <div class="text-danger">{{$errors->first('tenkhongdau')}}</div>
                                 @endif
                            </div>
                            <div class="form-floating mb-3">
                                <div class="form-label h5">Thể loại</div>
                               <select class="form-select" name="idtheloai">
                                    @foreach($ds as $tl)
                                        @if ($lt[0]['idTheLoai'] == $tl->id)
                                        <option value="{{$tl->id}}" selected>{{$tl->Ten}}</option>
                                        @else
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                        @endif
                                    @endforeach
                               </select>
                                @if($errors->has('idtheloai'))
                                    <div class="text-danger">{{$errors->first('idtheloai')}}</div>
                                @endif
                            </div>

                        </div>

                        <div class="mt-4 mb-0">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-block" name="luutru" value="Cập nhật">
                                <a class="btn btn-primary btn-warning px-3" href="{{route('dslt')}}">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
