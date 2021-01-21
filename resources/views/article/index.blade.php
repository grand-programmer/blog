<x-layout.app title="Каталог ссылок">

    <div class="row h-md-20 blog-title">Каталог ссылок</div>


    <div class="row mb-2 pt-3">
        @forelse($articles as $article)
            <x-article.article_card :article="$article"/>
        @empty
            No articles yet.
        @endforelse

    </div>
    {{ $articles->links() }}
</x-layout.app>
