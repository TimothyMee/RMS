<?php

namespace App\Http\Controllers;

use App\UserSetting;
use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    //

    public function add(Request $request, UserSetting $userSetting)
    {
        /*$this->validate()*/

        try
        {
            $data = [
                    'theme' => $request->theme,
                    'sidebar' => '0',
                    'header' => '0',
                    'sidebar_menu' => '0',
                    'footer' => '0',
                    'user_id' => auth()->id(),
            ];

            $result = $userSetting->saveSetting($data);
            if ($result){
                return redirect()->back();
            }
            else
            {
                return apiFailure($request);
            }
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, UserSetting $userSetting)
    {
        /*$this->validate()*/

        try
        {
            $result = $userSetting->updateUserSettings($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewUserSetting(Request $request, UserSetting $userSetting)
    {
        try
        {
            $result = $userSetting->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }
}
