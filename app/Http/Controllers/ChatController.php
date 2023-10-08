<?php

namespace App\Http\Controllers;

use App\Events\StoreChatEvent;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{   
    public function index (){
        $chat = Chat::with('messages')->latest()->get();
        return view ('pages.user.chat')->with('chat', $chat); 
    }

    
    public function store (ChatRequest $request ){
        $request->validated();
        $first_user = auth()->user()->id;
        $second_user = auth()->user()->id;
        $chat = new Chat;
        $chat->service_id = $request -> service_id;
        $chat->first_user_id = $first_user;
        $chat->second_user_id = $second_user;
        $chat->save();
        $message = new Message;
        $message -> message = $request -> message;
        $message->chat_id = $chat->id;
        $message->save();

        broadcast(new StoreChatEvent($message->message, $chat->first_user_id, $chat->second_user_id))->toOthers();
      
        
        return $chat;
    }
}
