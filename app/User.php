<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'gender', 'DOB', 'tel_no', 'email', 'address', 'password',
        'image', 'identification_no', 'department_id', 'user_type', 'staff_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createNew($data)
    {
        $existingData = $this->where('identification_no', '=', $data['identification_no'])->first();
        if($existingData === null){
            isset($data['staff_id']) ? $data['staff_id'] : $data['staff_id'] = auth()->id();
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : bcrypt('secret');
            if(!isset($data['image'])){
                $data['image'] = $data['identification_no'].'.jpg';
            }
            return $this->create($data);
        }
    }

    public function deleteUser($data)
    {
        return $this->delete($data);
    }

    public function view(Array $requests)
    {
        foreach ($requests as $request)
        {
            $results[] = $this->where('id', $request)->get();
        }

        return $results;
    }

    public function viewUserType(Array $requests)
    {
        foreach ($requests as $request)
        {
            $results[] = $this->where('user_type', $request)->get();
        }

        return $results;
    }

    public function viewAll()
    {
        return $this->all();
    }

    public function updateUser($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
            ->update(
                [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'middlename' => $data['middlename'],
                'tel_no' => $data['tel_no'],
                'email' => $data['email'],
                'address' => $data['address'],
                'identification_no' => $data['identification_no'],
                'image' => $data['image'],
                'department_id' => $data['department_id'],
                'user_type' => $data['user_type'],
                'staff_id' => $data['staff_id']
                ]
            );
    }

    public function updateUserPassword($data)
    {
        $data['staff_id'] = auth()->id();
        /*$existingData = $this->where('password', '=', bcrypt($data['old_password']))
                            ->where('id', '=', auth()->id())->first();*/

        return $this->where('id', auth()->id())
                    ->update(
                        [
                            'password' => bcrypt($data['new_password']),
                            'staff_id' => $data['staff_id']
                        ]
                    );


    }
}
