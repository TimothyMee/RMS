<?php

namespace App\Http\Controllers;

use App\CourseRegistered;
use Illuminate\Http\Request;

class CourseRegisteredController extends Controller
{
    //

    public function newRegistration()
    {
        return view('course-registration.new-registration');
    }

    public function editIndex()
    {
        return view('course-registration.edit-registration');
    }

    public function add(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->createNew($request->all());
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


    public function delete(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->deleteRegistration($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function edit(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->updateRegistration($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewRegistrations(CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->viewAll();
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewRegistration(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->view($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewSelectedRegistration(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->viewSelected($request->all());

            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewSelectedRegistrationForStudents(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->viewSelectedForStudent($request->all());

            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }


}
