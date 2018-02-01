<?php

namespace App\Http\Controllers;

use App\Result;
use App\ResultSetting;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //

    public function index()
    {
        return view('results.index');
    }

    public function openView()
    {
        return view('results.view');
    }

    public function editIndex()
    {
            return view('results.edit');
    }


    public function add(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->createNew($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            $responder['status'] = 400;
            return response()->json($responder);
        }
    }

    public function delete(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->deleteResult($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->updateResult($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewResults(Result $resultObject)
    {
        try
        {
            $result = $resultObject->viewAll();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewResult(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewResultSetting(ResultSetting $resultSetting)
    {
        try
        {
            $result = $resultSetting->getSetting();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function editResultSetting(Request $request, ResultSetting $resultSetting)
    {
        try
        {
            $result = $resultSetting->updateSetting($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewSelectedResult(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->viewSelected($request->all());

            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function updateStatus(Request $request, Result $resultObject)
    {
        try
        {

        }
        catch (\Exception $e)
        {

        }
    }
}
