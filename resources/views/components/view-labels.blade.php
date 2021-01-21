Viewed: <span id="view-count">{!! $article->view_count !!}</span>
<script>
    window.onload = function () {
        setTimeout(sendViewed, 5000, {{$article->id}});

    };


</script>
