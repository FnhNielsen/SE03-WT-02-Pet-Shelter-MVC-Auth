<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdoptionController extends Controller
{
    public function create()
    {
        if(auth()->check()){
            return view('adoptions.create');
        }
        else return redirect()->route('login');
        //else return view ('register');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required'],
            'description' => ['required'],
            'image'       => ['file', 'image']
        ]);
        if (Auth::check())
        {
            $adoption = new Adoption();
            if ($request->has('image'))
            {
                $filename = Str::random(32) . "." . $request->file('image')->extension();
                $request->file('image')->move('imgs/uploads', $filename);
                $adoption->image_path = "imgs/uploads/$filename";
            }
            else
            {
                $adoption->image_path = "imgs/demo/4.jpg";
                $adoption->name        = $validated['name'];
                $adoption->description = $validated['description'];
                $adoption->listed_by   = auth()->id();
                $adoption->save();
            }
            return redirect()->home()->with('success', "Post for $adoption->name created successfully");
        }
        else
        {
            return redirect()->route('login');
        }

        //Virker ikke helt :((
        //return redirect()->home()->with('success', "Post for".$adoption->name. "created successfully");
        //return redirect()->route('home')->with('success', 'Post for '.$adoption->name.' created successfully');

        /*
        |-----------------------------------------------------------------------
        | Task 4 User, step 5.
        | The $adoption variable should be assigned to the logged user.
        | This is done using the listed_by field from the user column in the database.
        |-----------------------------------------------------------------------
        */

    }

    public function show(Adoption $adoption)
    {
        return view('adoptions.details', ['adoption' => $adoption]);
    }

    public function adopt(Adoption $adoption)
    {
        if(auth()->id() == $adoption->listed_by){
            abort(403);
        }

        $adoption->adopted_by = auth()->id();
        $adoption->save();

        return redirect()->home()->with('success', "Pet $adoption->name adopted successfully");
    }


    public function mine(Adoption $adoption)
    {
        if (Auth::check()) {
            $adoptions = Adoption::where($adoption->adopted_by == auth()->id());
            return view('adoptions.list', ['adoptions' => $adoptions, 'header' => 'My Adoptions']);
        }
        return redirect()->route('login');
    }
}
