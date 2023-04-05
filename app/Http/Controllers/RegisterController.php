<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function view(){
        return view('register');
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'name' => 'required|alpha|min:3|max:40',
            'email' => 'required|string|unique:users|email:dns|ends_with:@gmail.com',
            'password' => 'required|string|min:6|max:12'    ,
            'number' => 'required|numeric|digits:10|starts_with:08',
        ]);

        $validasi['password'] = bcrypt($validasi['password']);
        User::create($validasi);
        return redirect('/login');
    }
}
