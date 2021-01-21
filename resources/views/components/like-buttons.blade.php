
        <button class="text-xs like" data-action="/api/v1/{{ $article->id }}/like">
            Like: <span class="count w-100" >{!! $article->like_count !!}</span>
        </button>
