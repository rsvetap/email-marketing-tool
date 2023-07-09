<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('admin.layout.components.head')

<body class="authentication-bg">
@yield('content-wrapper')

<footer class="footer footer-alt">
    {{ date("Y") }} © {{ config('app.name') }}
</footer>

@include('admin.layout.components.scripts')

</body>
</html>
