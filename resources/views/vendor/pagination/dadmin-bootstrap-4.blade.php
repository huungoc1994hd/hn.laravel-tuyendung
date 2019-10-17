@if ($paginator->hasPages())
    <div class="dataTables_paginate paging_simple_numbers">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" class="paginate_button previous">
                <i class="fa fa-angle-double-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        <span>
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true" class="ml-2 mr-2">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="paginate_button current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="paginate_button">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="paginate_button next">
                <i class="fa fa-angle-double-right"></i>
            </a>
        @endif
    </div>
@endif
