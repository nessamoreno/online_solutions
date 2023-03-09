<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    //Cambiar función y utilizar una sola
    public function indexp()
    {
        $info['publications'] = Publication::all();
        return view('welcome', $info);
    }

    //Index 
    public function index()
    {
        $info ['publications']= Publication::orderByDesc('created_at')->get();
        return view('dashboard', $info);
    }

    public function new(): View
    {
        return view('publication.new');
    }

    //Create publication
    public function create(Request $request)
    {   
        $id_user = Auth::user()->id;
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'imagen' => 'required|string',
            ]);
            
            $publication = Publication::create([
                'title' => $request->title,
                'description' => $request->description, 
                'imagen' => $request->imagen,
                'id_user' => $id_user,
            ]);
            $publication->save();
            return redirect()->route('dashboard');
            
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function show(): View
    {
        $id_user = Auth::user()->id;
        $publication = Publication::where('id_user',$id_user)->orderByDesc('created_at')->get();
        $info =['publications' => $publication];
        return view ('publication.show', $info);
    }
}
