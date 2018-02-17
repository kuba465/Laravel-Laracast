<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/pages.css" rel="stylesheet">
</head>

<body>

<div class="container">
    @include('pages.logo')

    @include('pages.nav')

    @yield('titleAndTwoPosts')
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            @yield('content')
        </div>
        <aside class="col-md-4 blog-sidebar">
            @include('pages.includeInMain.sidebar')
        </aside>
    </div>
</main>

@include('pages.footer')

</body>
</html>