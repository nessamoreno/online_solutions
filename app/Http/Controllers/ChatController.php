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
        $chat = Chat::where('id_user_guest',$id_user_guest)
        ->select('u.name','p.*', 'chats.*')
        ->join('publications as p','chats.id_publication', '=','p.id')
        ->join('users as u','p.id_user','=','u.id')
        ->orderByDesc('chats.created_at')
        ->get();
        
        $info = ['chats' => $chat];
        return view('chat.list', $info);
    }

    public function show($id_publication)
    {
        $existingChat = Chat::where('id_publication', $id_publication)
                        ->where('id_user_guest', Auth::user()->id)
                        ->select('u.name', 'p.*','chats.*')
                        ->join('publications as p','chats.id_publication', '=', 'p.id')
                        ->join('users as u','p.id_user', '=' , 'u.id')->first();    

        if($existingChat){
            $data = [
                'id_chat' => $existingChat->id,
                'id_publication' => $existingChat->id_publication,
                'id_user_guest' => $existingChat->id_user_guest,
                'messages' => $existingChat->messages->toArray(),
                'existingChat' => $existingChat
            ];
            return view('chat.show', $data);            
        }else{
            $chat = new Chat();
            $chat->id_publication = $id_publication;
            $chat->id_user_guest = Auth::user()->id;
            $chat->save();
            $data = [
                'id_chat' => $chat->id,
                'id_publication' => $chat->id_publication,
                'id_user_guest' => $chat->id_user_guest
            ];
            return view('chat.show', $data);
        }

    }
}
