<div class="col-md-12">
    <div class="card flex-md-row mb-4 box-shadow h-md-150">
        <div class="card-body d-flex flex-column align-items-start">
            <h3 class="mb-0">
                <a class="text-dark" href="/articles/{{$article->slug}}">{{$article->title}}</a>
            </h3>
            <p class="card-text mb-auto mt-md-3">{{$article->text}}</p>
            <div><x-tags-links :article="$article"/></div>

        </div>
        <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x150?theme=thumb" alt="Card image cap">
    </div>
</div>
