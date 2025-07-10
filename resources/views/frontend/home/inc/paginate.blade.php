@php
    $queryParams = $params ?? [];
    $currentPage = $item->currentPage();
    $lastPage = $item->lastPage();
    $start = max(1, $currentPage - 1);
    $end = min($lastPage, $start + 3);
    if ($end - $start < 3) {
        $start = max(1, $end - 3);
    }
@endphp

@if ($item->lastPage() > 1)
    <nav class="custom-pagination my-5">
        <ul>
            @if ($item->onFirstPage())
                <li class="disabled-pagination-link"><span>&laquo; Previous</span></li>
            @else
                <li class="previous">
                    <a href="{{ $item->appends($queryParams)->previousPageUrl() }}">
                        &laquo; Previous
                    </a>
                </li>
            @endif

            @for ($i = $start; $i <= $end; $i++)
                <li>
                    <a href="{{ $item->appends($queryParams)->url($i) }}" class="{{ $i == $currentPage ? 'active' : '' }}"
                       >
                        {{ $i }}
                    </a>
                </li>
            @endfor

            @if ($item->hasMorePages())
                <li class="next">
                    <a href="{{ $item->appends($queryParams)->nextPageUrl() }}">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li class="disabled-pagination-link">
                    <span>Next &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
