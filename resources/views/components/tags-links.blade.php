@if($article->tags_links)
    {!! $article->tags_links->map(function($tag) {
            return '<a href="#'.$tag->slug.'">'.'#'.$tag->name.'</a>';
        })->implode(' | ')
    !!}
@else
    None
@endif
