<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function create(Request $request, $id_chat,$id_publication)
    {   
        $message = new Message();
        $message->message = $request->message; 
        $message->id_chat = $id_chat;
        $message->save();
        return redirect()->route('chat.show',['id_publication' => $id_publication]);
    } 

}
