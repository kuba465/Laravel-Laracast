<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

//        $user = User::create(request(['name', 'email', $password]));

        $user = User::create([
            'name' => \request('name'),
            'email' => \request('email'),
            'password' => Hash::make(\request('password'))
        ]);

        auth()->login($user);

        return redirect()->home();
    }
}
