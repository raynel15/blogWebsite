<!DOCTYPE html>

<html lang="en">

<head>

    @include('layout.partial-userprofile.head')

</head>

<body>


@include('layout.universal.nav')

@include('layout.partial-userprofile.header')

@yield('content')

@include('layout.universal.footer')

@include('layout.partial-userprofile.footer-scripts')

</body>

</html>
