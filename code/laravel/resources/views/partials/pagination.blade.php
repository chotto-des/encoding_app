@if ($paginator->hasPages())
@php
    $current  = $paginator->currentPage();
    $last     = $paginator->lastPage();
    $window   = 2; // pages to show on each side of current
    $start    = max(2, $current - $window);
    $end      = min($last - 1, $current + $window);
@endphp
<nav class="pagination-nav" aria-label="Pagination">

    {{-- First page jump --}}
    @if ($paginator->onFirstPage())
        <span class="page-btn page-btn--disabled" aria-disabled="true" title="First page">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5 11.25 12l7.5-7.5M11.25 19.5 3.75 12l7.5-7.5" />
            </svg>
        </span>
    @else
        <a href="{{ $paginator->url(1) }}" class="page-btn" title="First page">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5 11.25 12l7.5-7.5M11.25 19.5 3.75 12l7.5-7.5" />
            </svg>
        </a>
    @endif

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span class="page-btn page-btn--disabled" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="page-btn" rel="prev">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </a>
    @endif

    {{-- Always show page 1 --}}
    <a href="{{ $paginator->url(1) }}" class="page-btn {{ $current == 1 ? 'page-btn--active' : '' }}">1</a>

    {{-- Left dots --}}
    @if ($start > 2)
        <span class="page-btn page-btn--dots">...</span>
    @endif

    {{-- Windowed page numbers --}}
    @for ($page = $start; $page <= $end; $page++)
        <a href="{{ $paginator->url($page) }}" class="page-btn {{ $page == $current ? 'page-btn--active' : '' }}">{{ $page }}</a>
    @endfor

    {{-- Right dots --}}
    @if ($end < $last - 1)
        <span class="page-btn page-btn--dots">...</span>
    @endif

    {{-- Always show last page --}}
    @if ($last > 1)
        <a href="{{ $paginator->url($last) }}" class="page-btn {{ $current == $last ? 'page-btn--active' : '' }}">{{ $last }}</a>
    @endif

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-btn" rel="next">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>
    @else
        <span class="page-btn page-btn--disabled" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
    @endif

    {{-- Last page jump --}}
    @if ($current == $last)
        <span class="page-btn page-btn--disabled" aria-disabled="true" title="Last page">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 4.5 12.75 12l-7.5 7.5M12.75 4.5 20.25 12l-7.5 7.5" />
            </svg>
        </span>
    @else
        <a href="{{ $paginator->url($last) }}" class="page-btn" title="Last page">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 4.5 12.75 12l-7.5 7.5M12.75 4.5 20.25 12l-7.5 7.5" />
            </svg>
        </a>
    @endif

</nav>
@endif
