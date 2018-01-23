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
        $result  =  $course->createNew($request->all());
        return $result;
    }

    public function viewCourses(Course $course)
    {
        try
        {
            $result = $course->viewAll();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewCourse(Request $request, Course $course)
    {
        try
        {
            $result = $course->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, Course $course)
    {
        try
        {
            $result = $course->updateCourses($request->all());
            if($result)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }
        catch(\Exception $e)
        {
            return $e;
        }
    }
}
