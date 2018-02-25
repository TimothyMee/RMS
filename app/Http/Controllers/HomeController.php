<?php

namespace App\Http\Controllers;

use App\Course;
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

    public function test(User $user,  Course $course)
    {
        $courses = $course->viewAll();
        $users = $user->viewAll();

        $admin = array();
        $student = array();
        $professor = array();
        $data = array();

        foreach ($users as $user){
            if ($user->user_type == 1 || $user->user_type == 2){
                $admin[] = $user;
            }}
           /* elseif ($users['user_type'] == 3){
                $student[] = $user;
            }
            elseif ($users['user_type'] == 4){
                $professor[] = $user;
            }
        }*/

        $data = [
                'courses' => $courses,
                'student' => $users,
                'admin' => $admin,
                'professor' => $professor
                ];

        return view('welcome')->with('data',$data);
    }
}
