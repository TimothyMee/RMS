<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function index()
    {
        return view('students.index');
    }

    public function add()
    {
        return view('students.add');
    }

    public function postAdd(Request $request, User $user)
    {
        /*$this->validate()*/

        try
        {
            $result = $user->createNew($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function edit()
    {
        return view ('students.edit');
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

    public function viewStudent(Request $request, User $user)
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

    public function viewStudentProfile(User $user)
    {
        try
        {
            $result = $user->view([auth()->id()]);
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewStudents(User $user)
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
}
