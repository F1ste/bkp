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
        $chat = Chat::latest()->get();
        return view ('pages.user.chat')->with('chat', $chat); 
    }
    public function store (ChatRequest $request ){
        $request->validated();
        $user = auth()->user()->id;
        $chat = new Chat;
        $chat->message = $request->message;
        $chat->service_id = $request -> service_id;
        $chat->user_id = $user;
        $chat->save();

        broadcast(new StoreChatEvent($chat->message, $chat->user_id, $chat->service_id))->toOthers();
      
        
        return $chat;
    }
}
