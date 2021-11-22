<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::latest()->unadopted()->get();
        return view('adoptions.list', ['adoptions' => $adoptions, 'header' => 'Available for adoption']);
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $loginAttributes = $request->validate([
            'name'=> 'required',
            'email'=> ['required', 'email']
        ]);
        Auth::login($loginAttributes);
        return redirect('/login');
        /*
        |-----------------------------------------------------------------------
        | Task 3 Guest, step 5. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $userAttributes = $request->validate([
            'name'=> 'required',
            'email' => ['required','email'],
            'password' => 'required'
        ]);
        User::created($userAttributes);
        Auth::login($userAttributes);
        return redirect('/');
    }

    public function logout()
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 User, step 3. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
    }
}
