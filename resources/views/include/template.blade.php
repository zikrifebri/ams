<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">

    <title>Aplikasi Manajemen Surat</title>
    {!! Html::style('bootstrap_3_3_6/css/bootstrap.min.css') !!}
    {{-- {!! Html::style('klorofil/assets/vendor/bootstrap/css/bootstrap.min.css') !!} --}}
    {!! Html::style('klorofil/assets/vendor/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('klorofil/assets/vendor/linearicons/css/style.css') !!}
    {!! Html::style('klorofil/assets/vendor/chartist/css/chartist.custom.css') !!}
    {{-- {!! Html::style('klorofil/assets/css/main.css') !!} --}}
    {!! Html::style('css/style.css') !!}
    <link href="css/style.css?version=<?php echo filemtime('css/style.css'); ?>" rel="stylesheet">
    <!-- {!! Html::style('css/materialize.min.css') !!} -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container">
    @include('navbar')
    @yield('main')
    </div>
    {!! Html::script('js/jquery_2_2_1.min.js') !!}
    {!! Html::script('bootstrap_3_3_6/js/bootstrap.min.js') !!}
    {{-- {!! Html::script('klorofil/assets/vendor/jquery/jquery.min.js') !!}
    {!! Html::script('klorofil/assets/vendor/bootstrap/js/bootstrap.min.js') !!} --}}
    {!! Html::script('klorofil/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') !!}
    {!! Html::script('klorofil/assets/scripts/klorofil-common.js') !!}
    {!! Html::script('js/kkpapp.js')  !!}

    @yield('footer')
</body>
</html>


