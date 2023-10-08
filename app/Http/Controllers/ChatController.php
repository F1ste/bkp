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

    
    public function store (){
        $request->validated();
        $first_user = auth()->user()->id;
        $second_user = auth()->user()->id;
        $chat = new Chat;
        $chat->service_id = $request -> service_id;
        $chat->first_user_id = $first_user;
        $chat->second_user_id = $second_user;
        $chat->save();        
        return $chat;
    }

    public function sendMessage (ChatRequest $request ){
        $message = new Message;
        $message -> message = $request -> message;
        $message->chat_id = $request->chat_id;
        $message->save();

        broadcast(new StoreChatEvent($message->message,auth()->user()->id,auth()->user()->id))->toOthers();

        return response()->json($message);
    }
}
