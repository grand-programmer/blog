<x-layout.app title="Главная страница">
    <div class="row h-md-20 blog-title">Главная страница</div>
    <div class="row mb-2 pt-3">
        @forelse($latestArticles as $article)
            <x-article.article_card :article="$article"/>
        @empty
            No articles yet.
        @endforelse

    </div>

</x-layout.app>
