<x-layout.app title="Каталог ссылок - {{$article->title}}">
    <!-- Page Header -->
    <div class="masthead h-md-250 d-flex" style="background-image: url('/public/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container justify-content-center align-self-center">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading text-center ">
                        <h1>{{$article->title}}</h1>
                        <span class="subheading">{{date('Y-m-d',strtotime($article->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mx-auto">
            <div class="card">
                <div class="card-body">
                    {{$article->text}}
                </div>
                <div class="card-footer">
                    <x-tags-links :article="$article"/>
                    <div class="float-right">
                        <x-like-buttons :article="$article"/>
                        <x-view-labels :article="$article"/>
                    </div>

                </div>
            </div>
            <!-- Comments Form -->
            <x-comment-form/>

        </div>

    </div>

</x-layout.app>
