<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultSetting extends Model
{
    protected $fillable = ['settings', 'staff_id'];
    //
    /*public function createNew($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->create($data);
    }*/

    public function deleteSettings($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->delete($data);
    }

    public function getSetting()
    {
        return $this->all()->last();
    }

    public function updateSetting($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
                    ->update(['settings' => $data['settings']],
                             ['staff_id' => $data['staff_id']]);
    }
}
