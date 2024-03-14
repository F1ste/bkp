<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css?v=1710447010') }}"/>
        <link rel="stylesheet" href="{{ asset('plugins/bvi/dist/css/bvi.min.css') }}"/>
        @hasSection('title')
            <title>@yield('title') &mdash; {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
            
            ym(96380785, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <!-- /Yandex.Metrika counter -->
    </head>
    <body>
        <noscript><div><img src="https://mc.yandex.ru/watch/96380785" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <div class="wrapper">
            <x-header />

            @yield('content')

            <x-footer-index />
            <x-how-it-works-popup/>
        </div>
        <script src="{{ asset('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js?v=1710447010') }}"></script>
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
