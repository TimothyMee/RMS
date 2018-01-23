<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            if (auth()->attempt(['identification_no' => $data['identification_no'], 'password' => $data['password'], 'is_active' => true])) {
                return redirect()->intended(route('home'));
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
