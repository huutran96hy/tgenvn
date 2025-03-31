@if ($paginator->hasPages())
    <div class="paginations">
        <ul class="pager">
            {{-- Nút Previous --}}
            @if ($paginator->onFirstPage())
                <li><a class="pager-prev disabled" href="#"></a></li>
            @else
                <li><a class="pager-prev" href="{{ $paginator->previousPageUrl() }}"></a></li>
            @endif

            {{-- Các trang --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="pager-number disabled">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pager-number active" href="#">{{ $page }}</a></li>
                        @else
                            <li><a class="pager-number" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Nút Next --}}
            @if ($paginator->hasMorePages())
                <li><a class="pager-next" href="{{ $paginator->nextPageUrl() }}"></a></li>
            @else
                <li><a class="pager-next disabled" href="#"></a></li>
            @endif
        </ul>
    </div>
@endif
