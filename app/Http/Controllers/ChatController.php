<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Chat;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{ 
    public function list()
    {
        $id_user_guest = Auth::user()->id;
        $chat = Chat::where('id_user',$id_user_guest)
        ->select('u.name','p.*', 'chats.*')
        ->join('publications as p','chats.id_publication', '=','p.id')
        ->join('users as u','p.id_user','=','u.id')
        ->orderByDesc('chats.created_at')
        ->get();
        $info = ['chats' => $chat];
        return view('chat.list', $info);
    }

    public function show(Request $request)
    {
        $id_publication = $request->id;
        $id_chat = $request->id;
        $publication = Publication::where('id_publication',$id_publication);
        $chat = Chat::where('id_chat', $id_chat);
        return view('chat.show', compact('publication', 'chat'));
    }

    public function create(Request $request)
    {
        $existingChat = Chat::where('id_publication', $request->id_publication)
                        ->where('id_user_guest', Auth::user()->id)
                        ->first();
        // dd($existingChat);
        if($existingChat){
            return redirect()->route('chat.show', $existingChat);            
        }else{
            $chat = new Chat();
            $chat->id_publication = $request->id_publication;
            $chat->id_user_guest = Auth::user()->id;
            $chat->save();
            return view('chat.show', compact('chat'));
        }
        
    }
}
