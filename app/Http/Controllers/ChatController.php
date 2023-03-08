<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Chat;
use App\Models\Publication;

class ChatController extends Controller
{
    // public function index(Request $request): View
    // {
    //     $title = $request->input('title');
    //     $publication = Publication::where('title', $title)->first();
    //     return view('chat.show', compact('publication'));
    // }
    
    public function show(Request $request)
    {
        $id_publication = $request->id;
        $id_chat = $request->id;
        $publication = Publication::where('id_publication',$id_publication);
        $chat = Chat::where('id_chat', $id_chat);
        return view('chat.show', compact('publication, chat'));
        // dd($chat, $publication);
    }

    public function create_chat()
    {
        $id_publication = Publication::publication()->id;
        try {
            $chat = Chat::create([
                'id_publication' => $id_publication
            ]);
            return redirect()->route('chat.show');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
