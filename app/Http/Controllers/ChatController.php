<?php

namespace App\Http\Controllers;

use App\Events\StoreChatEvent;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use App\Models\Feedback;
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
        $feedback = Feedback::with('service')->where('user_id',auth()->user()->id )->first();
        $first_user = $feedback->user_id;
        $second_user = $feedback->service->user_id;
        $chat = new Chat;
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
        $chat = Chat::where('id',$message->chat_id)->first();
        broadcast(new StoreChatEvent($message->message,$chat->first_user_id,$chat->second_user_id))->toOthers();

        return response()->json($message);
    }
}
