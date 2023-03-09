<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'date' => ['required'],
            'message' => ['required'],
            'id_chat' => ['required']
        ]);

        $message = Message::create([
            'date' => $request->date,
            'message' => $request->message,
            'id_chat' => $request->id_chat    
        ]);
        
        $message->save();
        return view('chat.show',$message);
    } 
}
