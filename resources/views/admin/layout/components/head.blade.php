<head>
    <title> {{ config('app.name') }} | @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <link href="{{ asset('themes/admin/images/favicons/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180">--}}
{{--    <link href="{{ asset('admin/images/favicons/favicon-32x32.png') }}" rel="icon" type="image/png" sizes="32x32">--}}
    <link href="{{ asset('assets/admin/images/favicon.png') }}" rel="icon" type="image/png" sizes="16x16">
    <meta name="msapplication-TileColor" content="#FFF">
    <meta name="theme-color" content="#FFF">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('assets/admin/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    @stack('css')
</head>
