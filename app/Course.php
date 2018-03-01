<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['name', 'course_code', 'unit','image','professor_id', 'staff_id'];

    public function createNew($data)
    {
        $existingData = $this->where('name', '=', $data['name'])->first();
        if ($existingData === null){
            $data['staff_id'] = auth()->id();
            return $this->create($data);
        }
        return false;
    }

    public function deleteCourse($data)
    {
        $data['staff_id'] = auth()->id();
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

    public function updateCourses($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
                    ->update(['name' => $data['name'],'course_code' => $data['course_code'],'unit' => $data['unit'], 'professor_id' => $data['professor_id']]);
    }
}
