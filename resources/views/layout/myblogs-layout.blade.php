<!DOCTYPE html>

<html lang="en">

<head>

    @include('layout.partial-myblogs.head')

</head>

<body>


@include('layout.universal.nav')

@include('layout.partial-myblogs.header')

@yield('content')

@include('layout.universal.footer')

@include('layout.partial-myblogs.footer-scripts')
</body>

</html>
