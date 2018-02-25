<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalOfStudents = Student::count();
        $totalOfStaffs = User::count();
        return view('home', ['totalOfStudents' => $totalOfStudents, 'totalOfStaffs' =>$totalOfStaffs]);
    }

    public function collectAuthUser()
    {
        return apiSuccess(auth()->id());
    }

    public function studentHome()
    {
        return view('studentHome', ['id' => auth()->user()->identification_no,]);
    }

    public function test(User $user,  Course $course, Department $department)
    {
        $courses = $course->viewAll();
        $users = $user->viewAll();
        $departments = $department->viewAll();

        $admin = array();
        $student = array();
        $professor = array();
        $data = array();
        $adminCount = 0;
        $studentCount = 0;
        $professorCount = 0;
        $courseCount = $course->count();

        foreach ($users as $user){
            if ($user->user_type == 1 || $user->user_type == 2){
                foreach ($departments as $department){
                    if($department->id  == $user->department_id){
                        $user->department = $department->name;
                    }
                }
                $admin[] = $user;
                $adminCount++;
            }
            elseif ($user->user_type == 3){
                foreach ($departments as $department){
                    if($department->id  == $user->department_id){
                        $user->department = $department->name;
                    }
                }
                $student[] = $user;
                $studentCount++;
            }
            elseif ($user->user_type == 4){
                foreach ($departments as $department){
                    if($department->id  == $user->department_id){
                        $user->department = $department->name;
                    }
                }
                $professor[] = $user;
                $professorCount++;
            }
        }

        $data = [
                'courses' => $courses,
                'student' => $student,
                'admin' => $admin,
                'professor' => $professor,
                'adminCount' => $adminCount,
                'studentCount' => $studentCount,
                'professorCount' => $professorCount,
                'courseCount' => $courseCount,
                ];

        return view('welcome')->with('data',$data);
    }
}
