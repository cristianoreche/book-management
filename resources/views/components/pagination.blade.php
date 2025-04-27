@if ($paginator->hasPages())
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="pagination__item">
                <span class="pagination__link pagination__link--disabled">&laquo;</span>
            </li>
        @else
            <li class="pagination__item">
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination__link">&laquo;</a>
            </li>
        @endif
        @foreach ($paginator->links()->elements as $element)
            @if (is_string($element))
                <li class="pagination__item">
                    <span class="pagination__link pagination__link--disabled">{{ $element }}</span>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination__item">
                            <span class="pagination__link pagination__link--active">{{ $page }}</span>
                        </li>
                    @else
                        <li class="pagination__item">
                            <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="pagination__item">
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination__link">&raquo;</a>
            </li>
        @else
            <li class="pagination__item">
                <span class="pagination__link pagination__link--disabled">&raquo;</span>
            </li>
        @endif
    </ul>
@endif
