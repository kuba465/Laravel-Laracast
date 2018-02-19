<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //constructor I need to add when I want secure methods
    //in this case only guests(not login user) can see login page
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //$isAuth = auth()->attempt(\request(['email', 'password']));
        //attempt method will automatically login user
        if (!auth()->attempt(\request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials'
            ]);
        }

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
