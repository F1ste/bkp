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
    public function index (Request $request){
        $chat = Chat::with('messages','user')->where('first_user_id', auth()->user()->id)->latest()->get();
        $current_chat = Chat::with('messages','user')->where('id', $request->id)->first();
        return view('pages.user.chat', [
            'chat' => $chat,
            'current_chat' => $current_chat,
        ]);
    }

    
    public function store (Request $request){
        $chat = new Chat;
        $chat->first_user_id = $request->first_user_id;
        $chat->second_user_id = $request->second_user_id;
        if((!Chat::where('first_user_id', '=', $request->input('first_user_id'))->exists())&&(!Chat::where('second_user_id', '=', $request->input('second_user_id'))->exists())){
            $chat->save();        
            return $chat;
        }
        else {
            return $chat;
        }
       
    }

    public function sendMessage (ChatRequest $request ){
        $message = new Message;
        $message -> message = $request -> message;
        $message->chat_id = $request->chat_id;
        $message->user_id = $request->user_id;
        $message->save();
        $chat = Chat::where('id',$message->chat_id)->first();
        broadcast(new StoreChatEvent($message->message,$chat->first_user_id,$chat->second_user_id))->toOthers();

        return response()->json($message);
    }
}
