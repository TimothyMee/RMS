<?php

namespace App\Http\Controllers;

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

    public function studentHome()
    {
        return view('studentHome', ['id' => auth()->user()->identification_no,]);
    }
}
