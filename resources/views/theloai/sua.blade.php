@extends('trangchu')

@section('title','Sửa thể loại')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Sửa thể loại</h3>
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
                                <input class="form-control" name="name" type="text" placeholder="Nhập tên thể loại" value="{{$tl[0]['Ten']?$tl[0]['Ten']:'';}}"/>
                                <label for="inputName">Tên</label>
                                @if($errors->has('name'))
                                    <div class="text-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="tenkhongdau" type="text" placeholder="Tên không dấu" value="{{$tl[0]->TenKhongDau?$tl[0]->TenKhongDau:'';}}"/>
                                <label for="inputLastName">Tên Không dấu</label>
                                @if($errors->has('tenkhongdau'))
                                    <div class="text-danger">{{$errors->first('tenkhongdau')}}</div>
                                 @endif
                            </div>

                        </div>

                        <div class="mt-4 mb-0">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-block" name="luutru" value="Cập nhật">
                                <a class="btn btn-primary btn-warning px-3" href="{{route('dstheloai')}}">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
