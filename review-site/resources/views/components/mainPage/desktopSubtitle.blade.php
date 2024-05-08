<div class="hidden lg:block mx-auto lg:max-w-2xl lg:mx-0">
    <h3 class="text-3xl font-bold">
        @if ($method === 'search')
            @if ($shops->isEmpty())
                @lang("main/index.noResults")
            @else
                @lang("main/index.searchResults")
            @endif
        @elseif ($method === 'category')
            @if ($shops->isEmpty())
                @lang('main/index.noShopsCategory', ['category' => $categories[$id]])
            @else
                @lang('main/index.shopsCategory', ['category' => $categories[$id]])
            @endif
        @else
            @lang('main/index.shops')
        @endif
    </h3>
</div>
