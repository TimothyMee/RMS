<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function index()
    {
        return view('students.index');
    }
    public function add(Request $request, Student $student)
    {
        /*$this->validate()*/

        try
        {
            $result = $student->createNew($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, Student $student)
    {
        /*$this->validate()*/

        try
        {
            $result = $student->updateStudent($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function delete(Request $request, Student $student)
    {
        try
        {
            $result = $student->deleteUser($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewStudent(Request $request, Student $student)
    {
        try
        {
            $result = $student->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewStudents(Student $student)
    {
        try
        {
            $result = $student->viewAll();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }
}
