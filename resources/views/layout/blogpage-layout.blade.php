<!DOCTYPE html>

<html lang="en">

<head>

    @include('layout.partial-blogpage.head')

</head>

<body>


@include('layout.universal.nav')

@include('layout.partial-blogpage.header')

@yield('content')

@include('layout.universal.footer')

@include('layout.partial-blogpage.footer-scripts')

</body>

</html>
