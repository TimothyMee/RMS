<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = ['name', 'description', 'staff_id'];
    //

    public function createNew($data)
    {
        isset($data['staff_id']) ? $data['staff_id'] : $data['staff_id'] = auth()->id();
        return $this->create($data);
    }

    public function deleteType($data)
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
        $result = $this->all();
        return $result;
    }

    public function updateType($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
            ->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'staff_id' => $data['staff_id']
            ]);
    }
}
