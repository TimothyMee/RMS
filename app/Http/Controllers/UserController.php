<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
    {
        return view('users.index');
    }

    public function add(Request $request, User $user)
    {
        /*$this->validate()*/

        try
        {
            $result = $user->createNew($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, User $user)
    {
        /*$this->validate()*/

        try
        {
            $result = $user->updateUser($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function openPasswordPage()
    {
        try
        {
            return view('users.password');
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function changePassword(Request $request, User  $user)
    {
        try
        {
            $result = $user->updateUserPassword($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function delete(Request $request, User $user)
    {
        try
        {
            $result = $user->deleteUser($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewUsers(User $user)
    {
        try
        {
            $result = $user->viewAll();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewUser(Request $request, User $user)
    {
        try
        {
            $result = $user->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }
}
