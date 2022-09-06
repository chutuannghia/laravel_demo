<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($ds as $sl)
                    @if ($sl->Ten == 'slide1')
                    <div class="item active">
                        <img class="slide-image" src="resources/img/slide/{{$sl->Hinh}}" alt="hinh">
                    </div>
                    @else
                    <div class="item">
                        <img class="slide-image" src="resources/img/slide/{{$sl->Hinh}}" alt="hinh">
                    </div>
                    @endif
                @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
