@extends('mail.layout')

@section('preheader')
Сброс пароля Культурная биржа
@endsection

@section('content')
<h1 style="font-family: Helvetica, sans-serif; Margin: 0; margin-bottom: 16px; font-size: 22px;">Сброс пароля</h1>
<p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
    Вы получили это письмо, поскольку мы получили запрос на сброс пароля для Вашей учетной записи.
</p>
<div align="center">
    <a
        href="{{ $url }}"
        style="
        background-color:#00af66;
        border-color:#00af66;
        border-radius:4px;
        border-style:solid;
        border-width:8px 18px 8px 18px;
        box-sizing:border-box;
        color:#fff;
        display:inline-block;
        font-family:'-apple-system' , 'blinkmacsystemfont' , 'segoe ui' , 'roboto' , 'helvetica' , 'arial' , sans-serif , 'apple color emoji' , 'segoe ui emoji' , 'segoe ui symbol';
        overflow:hidden;text-decoration:none;"
        target="_blank" 
        rel="noopener noreferrer">
        Сбросить пароль
    </a>
</div>
<p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
    Если вы не запрашивали сброс пароля, никаких дальнейших действий не требуется.
</p>
<p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; Margin: 0; margin-bottom: 16px;">
    С уважением, <br>Культурная биржа
</p>
<p
    style="box-sizing:border-box;font-family:'-apple-system' , 'blinkmacsystemfont' , 'segoe ui' , 'roboto' , 'helvetica' , 'arial' , sans-serif , 'apple color emoji' , 'segoe ui emoji' , 'segoe ui symbol';font-size:14px;line-height:1.5em;margin-top:15px;text-align:left">
    Если у вас возникли проблемы с нажатием кнопки "Сбросить пароль", скопируйте и вставьте URL-адрес, указанный ниже в
    адресную строку браузера: <span class="c4f3af36893d04dabreak-all"
        style="box-sizing:border-box;font-family:'-apple-system' , 'blinkmacsystemfont' , 'segoe ui' , 'roboto' , 'helvetica' , 'arial' , sans-serif , 'apple color emoji' , 'segoe ui emoji' , 'segoe ui symbol';word-break:break-all"><a
            href="{{ $url }}"
            style="box-sizing:border-box;color:#3869d4;font-family:'-apple-system' , 'blinkmacsystemfont' , 'segoe ui' , 'roboto' , 'helvetica' , 'arial' , sans-serif , 'apple color emoji' , 'segoe ui emoji' , 'segoe ui symbol'"
            data-link-id="8" target="_blank" rel="noopener noreferrer">{{ $url }}</a></span>
</p>
@endsection