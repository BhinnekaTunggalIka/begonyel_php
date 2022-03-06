<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        // return "login";
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    /**
     * login a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLogin(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $user = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($user)) {
            return redirect('/master-data/products');
        } else {
            return redirect('/login')->with('error', 'Username atau Password salah!');
        }
    }

    public function storeSignup(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'username' => 'required|min:4',
                'password' => 'required|min:5|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required|min:5'
            ],
            [
                'email.required' => 'boleh masukin email kamu?',
                'email.unique' => 'email pernah dipake nihh',
                'email.email' => 'seriusan dong..',
                'username.min' => 'minimal 4 suku kata',
                'password.required' => 'jangan lupa isi password',
                'password.min' => 'minimal 5 suku kata',
                'password.same' => 'password tidak sama',
                'password.required_with' => 'masukin ulang password kamu',
                'confirm_password.required' => 'masukin ulang password kamu',
                'confirm_password.min' => 'buat yang sama persis yaa..'
            ]
        );

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
