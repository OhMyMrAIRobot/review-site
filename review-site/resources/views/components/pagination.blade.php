@if ($paginator->lastPage() > 1)
    @php
        $perPage = $paginator->perPage();
    @endphp
    <div class="flex items-center justify-between px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="{{ ($paginator->currentPage() == 1) ? "pointer-events-none" : "hover:bg-gray-100" }}
            relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700"
            >@lang('pagination.previous')</a>
            <a href="{{ $paginator->url($paginator->currentPage() + 1)}}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'pointer-events-none' : '' }}
            relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >@lang('pagination.next')</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    {!! trans('pagination.pages', [
                        'from' => '<span class="font-medium">' . (($paginator->currentPage() - 1) * $perPage + 1) . '</span>',
                        'to' => '<span class="font-medium">' . min(($paginator->currentPage() - 1) * $perPage + $perPage, $paginator->total()) . '</span>',
                        'total' => '<span class="font-medium">' . $paginator->total() . '</span>'
                    ]) !!}
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="{{ $paginator->url($paginator->currentPage() - 1)}}" class="{{ ($paginator->currentPage() == 1) ? "pointer-events-none" : "hover:bg-gray-100" }}
                    relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 focus:z-20 focus:outline-offset-0">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        @php
                            $half_total_links = floor(6 / 2);
                            $from = $paginator->currentPage() - $half_total_links;
                            $to = $paginator->currentPage() + $half_total_links;
                            if ($paginator->currentPage() < $half_total_links) {
                                $to += $half_total_links - $paginator->currentPage();
                            }
                            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? "bg-indigo-600 text-white" : "hover:bg-gray-100" }}
                            relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 focus:z-20 focus:outline-offset-0 transition-all duration-200">{{ $i }}</a>
                        @endif
                    @endfor
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? "pointer-events-none" : "hover:bg-gray-100"}}
                    relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 focus:z-20 focus:outline-offset-0">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>
@endif
