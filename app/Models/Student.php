<?php

namespace App\Models;

use App\Models\BaseModel;

class Student extends BaseModel
{
    public function enrollment()
    {
        return $this->hasMany('App\Models\Enrollment');
    }
}
