<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Models\chat;
use App\Models\Publication;

class ChatController extends Controller
{
    public function index(Request $request): View
    {
        $title = $request->input('title');
        $publication = Publication::where('title', $title)->first();
        return view('chat.index', compact('publication'));
    }
}
