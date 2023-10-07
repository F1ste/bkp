<?php

namespace App\Http\Controllers;

use App\Events\StoreChatEvent;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{   
    public function index (){
        $chat = Chat::all();
        return view ('pages.user.chat')->with('chat', $chat); 
    }
    public function store (ChatRequest $request ){
        $request->validated();
        $user = auth()->user()->id;

        broadcast(new StoreChatEvent($request->message, $user))->toOthers();
        $chat = Chat::create($request->validated());
        
        return $chat;
    }
}
