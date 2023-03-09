<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function create(Request $request,Chat $chat)
    {
        $message = new Message();
        $message->id_chat = $chat->id;
        $message->id_user = auth()->user()->id;
        $message->message = $request->input('content');
        $message->save();
        return redirect()->route('chat.show' ,$chat->id);
    } 
}
