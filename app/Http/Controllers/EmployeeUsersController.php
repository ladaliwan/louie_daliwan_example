<?php

namespace App\Http\Controllers;

use App\AccessLevel;
use App\User;
use Illuminate\Http\Request;

class EmployeeUsersController extends Controller
{
    protected $accesslevels;

    public function __construct()
    {
        $this->accesslevels = AccessLevel::get();
    }

    public function index()
    {
        $employees = User::paginate(15);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        if(auth()->user()->accessLevel->description != 'SuperUser'){
            abort(403);
        }

        $accesslevels = $this->accesslevels;

        return view('employees.create', compact('accesslevels'));
    }

    public function store()
    {
        if(auth()->user()->accessLevel->description != 'SuperUser'){
            abort(403);
        }

        $validatedData = request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'age' => 'required',
            'job_title' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'birth_date' => 'required'
        ]);
        
         
        User::firstOrCreate([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'age' => request('age'),
            'job_title' => request('job_title'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'access_level_id' => request('accesslevel'),
            'birth_date' => request('birth_date')
        ]);

        return redirect('/employees');
    }

    public function edit(User $user)
    {
        if(auth()->user()->accessLevel->description != 'SuperUser' or $user->is_default){
            abort(403);
        }

        $accesslevels = $this->accesslevels;

        return view('employees.edit', compact('user', 'accesslevels'));
    }

    public function update(User $user)
    {
        if(auth()->user()->accessLevel->description != 'SuperUser' or $user->is_default){
            abort(403);
        }


        $validatedData = request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'age' => 'required|numeric',
            'job_title' => 'required|max:255',
            'email' => 'required|unique:users,email,'. $user->id. ',id',
            'accesslevel' => 'required',
            'password' => 'required',
            'birth_date' => 'required'
        ]);

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->age = request('age');
        $user->job_title = request('job_title');
        $user->email = request('email');
        $user->access_level_id = request('accesslevel');
        $user->birth_date = request('birth_date');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect("/employees/{$user->id}/edit");
    }

    public function destroy(User $user)
    {
        if(auth()->user()->accessLevel->description != 'SuperUser' and $user->is_default){
            abort(403);
        }
        
        $user->delete();

        return redirect('/employees');
    }
}
