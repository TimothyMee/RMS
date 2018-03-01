<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index()
    {
        return view('courses.index');
    }

    public function add(User $user)
    {
        $professors = $user->viewUserType(['4']);
        return view ('courses.add')->with('professors', $professors[0]);
    }

    public function postAdd(Request $request, Course $course, User $user)
    {
        try
        {
            if($request->hasFile('photo')){
                try{
                    $image = $request->file('photo');
                    $imageName = OptimiseImage($image, $request['course_code']);
                    $request['image'] = $imageName;
                }
                catch (\Exception $e){
                    echo '<script>alert("Upload a valid image");</script>';
                }
            }
            else
            {
                $professors = $user->viewUserType(['4']);
                return view ('courses.add')->with('professors', $professors[0]);
            }

            if($request['password']!= $request['c_password']){
                $request['password'] = '';
            }

            $result = $course->createNew($request->all());

            if ($result){
                return view('courses.index');
            }
        }
        catch (\Exception $e)
        {
            echo '<script>alert("Try again later and fill all fields");</script>';
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

    public function edit()
    {
        return view('courses.edit');
    }
    public function postEdit(Request $request, Course $course)
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
