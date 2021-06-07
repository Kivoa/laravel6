@if ($paginator->hasPages())
 
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span>上一页</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页</a>
        @endif
 
 
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a>
        @else
           <span>下一页</span>
        @endif
    
@endif