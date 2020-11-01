<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('auths.layouts.head')
</head>

<body style="background-color: #666666;">

@yield('content')

@include('auths.layouts.footer')

</body>
</html>

