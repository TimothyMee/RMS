<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function edit()
    {
        return view ('admin.edit');
    }

    public function postEdit(Request $request, User $user)
    {
        try
        {
            $result = $user->updateUser($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function add()
    {
        return view('admin.add');
    }

    public function postAdd(Request $request, User $user)
    {
        try
        {
            $google2fa = app('pragmarx.google2fa');
            $registration_data = $request->all();
            $registration_data['google2fa_secret'] = $google2fa->generateSecretKey();

            $request->session()->flash('registration_data', $registration_data);

            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $registration_data['email'],
                $registration_data['google2fa_secret']
            );
            // Pass the QR barcode image to our view
            return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function finalAdding(Request $request, User $user)
    {
        try
        {
            $request->merge(session('registration_data'));
            $result = $user->createNew($request);
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

}
