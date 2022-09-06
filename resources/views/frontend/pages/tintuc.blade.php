@extends("frontend.layout.master")
@section("noidung")
<!-- Page Content -->
    <div class="container">
        <div class="row">
        <!-- Blog Post Content Column -->
            <div class="col-md-9">
            <!-- Blog Post -->
            <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>
                <!-- Author -->
                <p class="lead">
                    by <a href="#">Quản Trị</a>
                </p>
                <!-- Preview Image -->
                <img class="img-responsive" src="resources/img/tintuc/{{$tintuc->Hinh}}" alt="Hình Tin Tức">
                <!-- Date/Time -->
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}
                </p>
                    <hr>
                <!-- Post Content -->
                <p class="lead">{!! $tintuc->NoiDung !!}</p>
                <hr>
                <!-- Blog Comments -->
                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <hr>
                <!-- Posted Comments -->
                <!-- Comment -->
                @if (count($tintuc->Comment) >0)
                @foreach($tintuc->Comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{isset($cm->Users->name)?$cm->Users->name:'ẩn danh'}}
                            <small>{{$cm->create_at}}</small>
                        </h4>
                        {!! $cm->NoiDung !!}
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    <!-- item -->
                        @foreach($tinlienquan as $tlq)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-4">
                                <a href="{{route('fetintuc',[$tlq->id, $tlq->TieuDeKhongDau])}}">
                                    <img class="img-responsive" src="resources/img/tintuc/{{$tlq->Hinh}}" alt="hinh">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="{{route('fetintuc',[$tlq->id, $tlq->TieuDeKhongDau])}}"><b>{{$tlq->TieuDe}}</b></a>
                            </div>

                            <p>{!! $tlq->Tomtat !!}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                    <!-- end item -->
                    </div>
                </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                <!-- item -->
                @foreach($tinnoibat as $tnb)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <a href="{{route('fetintuc',[$tnb->id, $tnb->TieuDeKhongDau])}}">
                                <img class="img-responsive" src="image/320x150.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <a href="{{route('fetintuc',[$tnb->id, $tnb->TieuDeKhongDau])}}"><b>{{ $tnb->TieuDe }}</b></a>
                        </div>
                        <p>{!! $tnb->TomTat !!}</p>
                        <div class="break"></div>
                    </div>
                @endforeach
                <!-- end item -->
            </div>
            </div>
            </div>
        </div>
    <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
