@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>< &nbsp;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">< &nbsp;</a></li>
        @endif

        {{-- Current Page --}}
        <li class="active"><span>{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span></li>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&nbsp;></a></li>
        @else
            <li class="disabled"><span>&nbsp;></span></li>
        @endif
    </ul>
@endif