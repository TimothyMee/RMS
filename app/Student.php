<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'tel_no',
        'email', 'identification_no', 'department_id', 'staff_id'
    ];

    public function createNew($data)
    {
/*        $data['password'] = isset($data['password']) ? bcrypt($data['password']) : bcrypt('secret');*/
        $data['staff_id'] = auth()->id();
        return $this->create($data);
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

    public function viewAll()
    {
        return $this->all();
    }
    public function updateStudent($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
            ->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'middlename' => $data['middlename'],
                'tel_no' => $data['tel_no'],
                'email' => $data['email'],
                'department_id' => $data['department_id'],
                'identification_no' => $data['identification_no'],
                'staff_id' => $data['staff_id']
            ]);
    }
}
