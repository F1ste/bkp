<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('front/css/style.css?v=124223535421234562343467379022542222411111') }}"/>
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
        
        <!-- Top.Mail.Ru counter -->
        <script type="text/javascript">
            var _tmr = window._tmr || (window._tmr = []);
            _tmr.push({id: "3499698", type: "pageView", start: (new Date()).getTime()});
            (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
            })(document, window, "tmr-code");
        </script>
        <noscript><div><img src="https://top-fwz1.mail.ru/counter?id=3499698;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>
        <!-- /Top.Mail.Ru counter -->

        <div class="wrapper">
            <div class="notifications-container"></div>
            <x-header />

            @yield('content')

            <x-footer-index />
            <x-partnership-widget-popup />
            <x-how-it-works-popup/>
        </div>
        <script src="{{ mix('front/js/app.js') }}"></script>
        <script src="{{ asset('front/js/app2.js?v=124223535421234562343467379022542222411111') }}"></script>
        <script src="{{ asset('plugins/bvi/dist/js/bvi.min.js') }}"></script>
        <script>
            new isvek.Bvi({
                target: '.impaired-togler',
                fontSize: 24,
                theme: 'white'
                //...etc
            });
        </script>
        <script type="module">
            const widgetForm = document.querySelector('#partnershipPopup');
            const widgetCloseBtn = widgetForm.querySelector('.popup__close');
                          
            function showFixedBlock() {
                widgetForm.classList.toggle('widget-form_active');
            }

            function hideFixedBlock() {
                widgetForm.classList.toggle('widget-form_active');
                sessionStorage.setItem('fixedBlockClosed', 'true');
            }

            if (!sessionStorage.getItem('fixedBlockClosed')) {
                setTimeout(showFixedBlock, 10000);
            }

            widgetCloseBtn.addEventListener('click', hideFixedBlock);
        </script>
    </body>
</html>
