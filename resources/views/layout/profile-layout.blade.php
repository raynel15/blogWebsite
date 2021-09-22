<!DOCTYPE html>

<html lang="en">

<head>

    @include('layout.universal.head')

</head>

<body>


@include('layout.universal.nav')

@include('layout.partial-profile.header')

@yield('content')

@include('layout.universal.footer')

@include('layout.universal.footer-scripts')

</body>

</html>
