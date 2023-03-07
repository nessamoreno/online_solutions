<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Redirect;
// use App\Http\Requests\PublicationCreateRequest;
use Exception;
use Illuminate\View\View;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function indexp()
    {
        $info['publications'] = Publication::all();
        return view('welcome', $info);
    }

    //Index 
    public function index()
    {
        $info['publications'] = Publication::all();
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
        //blication = new Publication();
    //    $publication->title = $request->title;
    //    $publication->description = $request->description;
    //    $publication->imagen = $request->imagen;
    //    $publication->id_user = Auth::user()->id;
    // //    dd($publication);
    //    $publication->save();
    //    return redirect('dashboard');

        // dd($request->description);
    //    $pu
    //    dd($publication->description);
    //    $id = Auth()->User
        // var_dump(Auth::user());
        // dd(Auth::user()->id);
      
    }

    public function show(): View
    {
        $id_user = Auth::user()->id;
        $publication = Publication::where('id_user',$id_user)->get();
        $info =['publications' => $publication];
        return view ('publication.show', $info);
    }
}
