<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    //

    public function index()
    {
        return view('professors.index');
    }

    public function edit()
    {
        return view ('professors.edit');
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
        return view('professors.add');
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
