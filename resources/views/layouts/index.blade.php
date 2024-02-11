<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('plugins/bvi/dist/css/bvi.min.css') }}"/>
        <title>@yield('title') - БКП</title>
    </head>
    <body>
        <div class="wrapper">
            <x-header />

            @yield('content')

            <x-footer-index />
            <x-feedback-popup/>
        </div>
        <script src="{{ asset('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js') }}"></script>
        <script src="{{ asset('plugins/bvi/dist/js/bvi.min.js') }}"></script>
        <script>
            new isvek.Bvi({
                target: '.impaired-togler',
                fontSize: 24,
                theme: 'white'
                //...etc
            });
        </script>
    </body>
</html>
