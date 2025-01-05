<div class="text-center py-3">
    <nav aria-label="Page navigation example" class="pagination-box">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($courses->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="la la-arrow-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $courses->previousPageUrl() }}" aria-label="Previous">
                        <i class="la la-arrow-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($courses->links()->elements[0] as $page => $url)
                @if ($page == $courses->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($courses->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $courses->nextPageUrl() }}" aria-label="Next">
                        <i class="la la-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="la la-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
    <p class="fs-14 pt-2">Showing {{ $courses->firstItem() }}-{{ $courses->lastItem() }} of {{ $courses->total() }}
        results</p>
</div>
