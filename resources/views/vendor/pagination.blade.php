@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2">

        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 bg-gray-300 text-gray-500 rounded">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 bg-[#0B6839] text-white rounded ">
                Previous
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 bg-gray-300 text-gray-500 rounded">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 bg-[#0B6839] text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-[#0B6839] hover:text-white">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 bg-[#0B6839] text-white rounded ">
                Next
            </a>
        @else
            <span class="px-3 py-2 bg-gray-300 text-gray-500 rounded">Next</span>
        @endif
    </nav>
@endif
