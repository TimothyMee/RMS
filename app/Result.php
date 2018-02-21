<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    protected $fillable = ['student_id', 'semester', 'year', 'course_reg_id', 'results', 'status', 'staff_id'];

    public function createNew($data)
    {
        $existingData = $this->where('student_id', '=', $data['student_id'])
            ->where('semester', '=' , $data['semester'])
            ->where('year', '=' , $data['year'])->first();

        if ($existingData === null){
            $data['results'] = json_encode($data['results']);
            $data['staff_id'] = auth()->id();
            return $this->create($data);
        }


    }

    public function deleteResult($data)
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

    public function updateResult($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('student_id', $data['student_id'])
                    ->where('semester', $data['semester'])
                    ->where('year', $data['year'])
                    ->update([
                                'results' => $data['results'],
                                'staff_id' => $data['staff_id']
                            ]);
    }

    public function updateResultStatus($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('student_id', $data['student_id'])
            ->where('semester', $data['semester'])
            ->where('year', $data['year'])
            ->update([
                'status' => $data['status'],
                'staff_id' => $data['staff_id']
            ]);
    }

    public function viewAll()
    {
        $result = $this->all();
        return $result;
    }

    public function viewSelected($data)
    {
        $results = $this->where('semester', $data['semester'])
            ->where('year', $data['year'])
            ->get();

        return $results;
    }
}
