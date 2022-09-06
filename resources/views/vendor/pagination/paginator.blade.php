@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled" style="display: none" aria-disabled="true" aria-label="@lang('pagination.previous')"> <span class="fs-4"> << </span> </a>
        @else
            <a class="icon item" style="color:blue;background-color:antiquewhite;padding:10px;margin:4px" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <span class="fs-4"> << </span> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item active p-2" style="color:#FF0040;background-color:#F7BE81;padding:10px" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item" style="color:blue;background-color:antiquewhite;padding:10px" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item"style="color:blue;background-color:antiquewhite;padding:10px;margin:1px"  href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <span class="fs-4"> >> </span> </a>
        @else
            <a class="icon item disabled" style="display: none" aria-disabled="true" aria-label="@lang('pagination.next')"> <span class="fs-4"> >> </span> </a>
        @endif
    </div>
@endif
