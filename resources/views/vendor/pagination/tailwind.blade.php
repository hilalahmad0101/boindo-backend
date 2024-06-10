@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-white text-base font-semibold  leading-tight">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

        </div>

        <div class="flex space-x-4">
            @if ($paginator->onFirstPage())
                <span
                    class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-4 py-2 rounded-lg  border-2 text-white border-white justify-start items-center gap-2 inline-flex">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>


    </nav>
@endif
