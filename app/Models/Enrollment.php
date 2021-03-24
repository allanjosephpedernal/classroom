<?php

namespace App\Models;

use App\Models\BaseModel;

class Enrollment extends BaseModel
{
    public function classes()
    {
        return $this->belonsTo('App\Models\Classes');
    }

    public function student()
    {
        return $this->hasMany('App\Models\Student');
    }
}
