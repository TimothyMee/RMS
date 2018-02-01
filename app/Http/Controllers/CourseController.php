<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index()
    {
        return view('courses.index');
    }
    public function add(Request $request, Course $course)
    {
        try
        {
            $result = $course->createNew($request->all());
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

    public function viewCourses(Course $course)
    {
        try
        {
            $result = $course->viewAll();
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewCourse(Request $request, Course $course)
    {
        try
        {
            $result = $course->view($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function edit(Request $request, Course $course)
    {
        try
        {
            $result = $course->updateCourses($request->all());
            if($result)
            {
                return apiSuccess($result);
            }
            else
            {
                return apiFailure(false);
            }
        }
        catch(\Exception $e)
        {
            return apiFailure($e);
        }
    }
}
