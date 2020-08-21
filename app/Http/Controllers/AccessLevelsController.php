<?php

namespace App\Http\Controllers;

use App\AccessLevel;
use App\User;
use Illuminate\Http\Request;

class AccessLevelsController extends Controller
{
    public function index()
    {
        if(auth()->user()->accessLevel->description != 'SuperUser'){
            abort(403);
        }


        $accessLevels = AccessLevel::paginate(10);

        return view('access-levels.index', compact('accessLevels'));
    }

    public function create()
    {
        if(auth()->user()->accessLevel->description != 'SuperUser'){
            abort(403);
        }


        return view('access-levels.create');
    }

    public function store()
    {
        if(auth()->user()->accessLevel->description != 'SuperUser'){
            abort(403);
        }


        $attribute = request()->validate([
            'description' => 'required'
        ]);

        AccessLevel::firstOrCreate($attribute);

        return redirect('/access-levels');
    }

    public function edit(AccessLevel $accessLevel)
    {
        if(auth()->user()->accessLevel->description != 'SuperUser' and $accessLevel->description != 'SuperUser'){
            abort(403);
        }


        return view('access-levels.edit', compact('accessLevel'));
    }

    public function update(AccessLevel $accessLevel)
    {   
        if(auth()->user()->accessLevel->description != 'SuperUser' and $accessLevel->description != 'SuperUser'){
            abort(403);
        }


        $accessLevel->description = request('description');
        $accessLevel->save();

        return redirect("/access-levels/{$accessLevel->id}/edit");
    }

    public function destroy(AccessLevel $accessLevel)
    {
        if(auth()->user()->accessLevel->description != 'SuperUser' and $accessLevel->description != 'SuperUser'){
            abort(403);
        }


        $users = User::where('access_level_id', $accessLevel->id)
            ->update(['access_level_id' => null]);

        $accessLevel->delete();   
        
        return redirect('/access-levels');
    }
}
