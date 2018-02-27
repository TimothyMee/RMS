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
            if ($result){
                return apiSuccess($result);
            }
            else
            {
                return apiFailure('');
            }
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function edit(Request $request, User $user)
    {
        /*$this->validate()*/

        try
        {
            $result = $user->updateUser($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
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
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function delete(Request $request, User $user)
    {
        try
        {
            $result = $user->deleteUser($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewUsers(User $user)
    {
        try
        {
            $result = $user->viewAll();
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewUser(Request $request, User $user)
    {
        try
        {
            $result = $user->view($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewSpecificUserType(User $user, Request $request)
    {
        try
        {
            $result = $user->viewUserType($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }
}
