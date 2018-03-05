<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    //
    protected $fillable = [
        'user_id', 'sidebar', 'header', 'sidebar_menu', 'footer', 'theme'
    ];

//    protected $table = 'user_settings';

    public function saveSetting($data)
    {
        $existingData = $this->where('user_id', '=', auth()->id());
        if(! $existingData->exists()){
            $data['user_id'] = auth()->id();
            $this->create($data);

            //Saving the theme value into the session
            $userSetting = $this->view(auth()->id());
            $userSetting = $userSetting[0]->theme;
            session(['theme' => $userSetting]);
            return true;
        }
        else{
            $this->updateUserSettings($data);

            //Saving the theme value into the session
            $userSetting = $this->view(auth()->id());
            $userSetting = $userSetting[0]->theme;
            session(['theme' => '']);
            session(['theme' => $userSetting]);
            return true;
        }
    }

    public function view($request)
    {
        $result = $this->where('user_id', $request)->get();

        return $result;
    }

    public function updateUserSettings($data)
    {
        $data['user_id'] = auth()->id();
        return $this->where('user_id',auth()->id())
            ->update(
                [
                    'sidebar' => $data['sidebar'],
                    'header' => $data['header'],
                    'sidebar_menu' => $data['sidebar_menu'],
                    'footer' => $data['footer'],
                    'theme' => $data['theme'],
                ]
            );
    }

}
