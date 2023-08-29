<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<section class="wrapper">
        <div class="container-aylo-test">
        <header class="row">
            @include('includes.header')
        </header>
        <div id="main" class="row">
            @yield('content')
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</section>
</body>
</html>
