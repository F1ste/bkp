<?php

namespace App\Http\Controllers;

use App\Mail\Admin\Help;
use App\Mail\AppealReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HelpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            ['message' => ['required', 'min:18']],
            [
                'message.required' => 'Текст вопроса обязателен',
                'message.min' => 'Слишком короткий вопрос. Добавьте деталей',
            ]
        );

        Mail::to('support@culturexchange.ru')->send(new Help($request->message, $request->user()));
        Mail::to($request->user()->email)->send(new AppealReceived($request->message));

        return ['message' => 'Ваш вопрос отправлен. Ожидайте ответ на почте.'];
    }
}
