<ul class="list-group" id="menu">
    <li href="#" class="list-group-item menu1 active">
        Danh mục
    </li>
    @foreach($theloai as $tl)
        @if (count($tl->Loaitin)>0)
        <li href="#" class="list-group-item menu1">
            {{$tl->Ten}}
        </li>
        <ul>
            @foreach ($tl->Loaitin as $lt)
            <li class="list-group-item">
                <a href="{{route('feloaitin', [$lt->id,$lt->TenKhongDau])}}">{{$lt->Ten}}</a>
            </li>
            @endforeach
        </ul>
        @endif
    @endforeach
</ul>
