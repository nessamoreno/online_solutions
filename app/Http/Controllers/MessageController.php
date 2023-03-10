<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function create(Request $request, Chat $id_chat)
    {   
        dd($request->all());
        // $request->validate([
        //     'message' => ['required'],
        //     'id_chat' => ['required'],
        // ]);
        
        // $message = Message::create([
        //     'message' => $request->message,
        //     'id_chat' => $id_chat,
        // ]);
       

        // $message->save();
        $message = new Message();
        $message->message = $request->message; 
        $message->id_chat = $request->id_chat;
        
        $message->save();
        return redirect()->route('chat.show', ['id' => $message->id_chat]);
    } 

}
