<?php

namespace App\Http\Controllers;

use App\Department;
use App\UserSetting;
use Illuminate\Http\Request;
use App\User;
use Image;

class AuthController extends Controller
{
    public function registerStudent(Department $department)
    {
        $departments = $department->viewAll();
        return view ('auth.register')->with('departments', $departments);
    }

    public function postStudentRegistration(Request $request, User $user,Department $department)
    {
        try
        {
                if($request->hasFile('photo')){
                   try{
                       $image = $request->file('photo');
                       $imageName = OptimiseImage($image, $request['identification_no']);
                       $request['image'] = $imageName;
                   }
                   catch (\Exception $e){
                       echo '<script>alert("Upload a valid image");</script>';
                   }
                }
                else
                {
                    $departments = $department->viewAll();
                    return view ('auth.register')->with('departments', $departments);
                }

            if($request['password']!= $request['c_password']){
                $request['password'] = '';
            }

            $result = $user->createNew($request->all());

            if ($result){
                return view('auth.login');
            }
        }
        catch (\Exception $e)
        {
            echo '<script>alert("Try again later and fill all fields");</script>';
        }
    }

    public function login()
    {
        $title = 'Login to your account';
        return view('auth.login', compact('title'));
    }

    public function postLogin(Request $request, UserSetting $userSetting)
    {
        $data = $request->all();
        try{
            if (auth()->attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => true])) {
                if (auth()->user()->user_type == 1 || auth()->user()->user_type == 2)
                {
                    //Saving the theme value into the session
                    $userSetting = $userSetting->view(auth()->id());
                    $userSetting = $userSetting[0]->theme;
                    session(['theme' => $userSetting]);
                    return redirect()->intended(route('home'));
                }

                elseif(auth()->user()->user_type == 3)
                {
                    return redirect()->intended(route('student.home'));
                }
                elseif(auth()->user()->user_type == 4)
                {
                    return 'Professor';
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
