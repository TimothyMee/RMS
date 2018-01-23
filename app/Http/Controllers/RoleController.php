<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function index()
    {
        return view('roles.index');
    }

    public function add(Request $request, Role $role)
    {
        try
        {
            $result = $role->createNew($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }


    public function delete(Request $request, Role $role)
    {
        try
        {
            $result = $role->deleteRole($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewRoles(Role $role)
    {
        try
        {
            $result = $role->viewAll();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewRole(Request $request, Role $role)
    {
        try
        {
            $result = $role->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, Role $role)
    {
        try
        {
            $result = $role->updateRole($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }
}
