<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{csrf_token()}}"/>
    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/public/css/blog.css" rel="stylesheet">
    <link href="/resources/sass/app.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">

            <div class="col-12 text-center">
                <a class="blog-header-logo text-dark" href="#">Blog</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <x-menu/>
    </div>
    <main role="main" class="container">
        {{$slot}}
    </main>
</div>


<footer class="blog-footer">
    <a href="#">Back to top</a>
    </p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="/resources/js/popper.min.js"></script>
<script src="/resources/js/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
<script>
    jQuery(document).ready(function () {
        jQuery('#commentSubmit').click(function (e) {
            e.preventDefault();
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('api/v1/addcomment') }}",
                method: 'post',
                dataType: "json",
                data: {
                    title: jQuery('#commentTitle').val(),
                    text: jQuery('#commentText').val(),
                },
                success: function (result) {
                    jQuery('#commentTitle').val('');
                    jQuery('#commentText').val('');
                    jQuery('.alert').show().addClass('alert-success');
                    jQuery('.alert').html(result);
                },
                error: function (result) {
                    jQuery('.alert').show().addClass('alert-danger');
                    jQuery('.alert').html(result.responseJSON.message);
                }

            });
        });
        jQuery('button.like').click(function (e) {
            e.preventDefault();
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var $t = $(this);
            jQuery.ajax({
                url: jQuery(this).data('action'),
                method: 'post',
                dataType: "json",
                success: function (result) {
                    console.log($t.children('span').text(result));
                },
                error: function () {
                    alert("Error");
                }

            });
        });


    });

    function sendViewed(id) {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: '/api/v1/' + id + '/view',
            method: 'post',
            dataType: "json",
            success: function (result) {
                jQuery('#view-count').text(result);
            },
            error: function () {
                console.log("Error");
            }

        });
    }
</script>
</body>
</html>
