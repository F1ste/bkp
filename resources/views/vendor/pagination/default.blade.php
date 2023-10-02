@if ($paginator->hasPages())
    <nav>
        <ul class="pagging">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagging__arrow-prev _icon-chevron disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                </li>
            @else
                <a class="pagging__arrow-prev _icon-chevron" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true"><span class="pagging__item">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><span class="pagging__item _active">{{ $page }}</span></li>
                        @else
                            <li><a class="pagging__item" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a class="pagging__arrow-next _icon-chevron" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
            @else
                <li class="pagging__arrow-next _icon-chevron disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                </li>
            @endif
        </ul>
    </nav>
@endif
