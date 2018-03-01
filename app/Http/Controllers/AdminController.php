<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function edit()
    {
        return view ('admin.edit');
    }

    public function postEdit(Request $request, User $user)
    {
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

    public function add()
    {
        return view('admin.add');
    }

    public function postAdd(Request $request, User $user)
    {
        try
        {
            $result = $user->createNew($request->all());
            if ($result){
                return apiSuccess($result);
            }
            else{
                return apiFailure('');
            }
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

}
