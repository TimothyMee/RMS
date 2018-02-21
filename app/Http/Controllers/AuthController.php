<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Login to your account';
        return view('auth.login', compact('title'));
    }

    public function postLogin(Request $request)
    {
        $data = $request->all();
        try{
            if (auth()->attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => true])) {
                if (auth()->user()->user_type == 1 || auth()->user()->user_type == 2)
                {
                    return redirect()->intended(route('home'));
                }

                elseif(auth()->user()->user_type == 3)
                {
                    return redirect()->intended(route('home'));
                }
                elseif(auth()->user()->user_type == 4)
                {
                    return 'Parent';
                }
            }
            return redirect()->back()->with('error', 'Identification No and Password Combination Incorrect')->withInput();
        } catch (\Exception $e)
        {
            /*Send us a mail */
            return redirect()->back()->with('error', 'Could not sign you in at the moment. Please try again...');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
