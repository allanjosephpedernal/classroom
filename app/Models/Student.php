<?php

namespace App\Models;

use App\Models\BaseModel;

class Student extends BaseModel
{
    public function classes()
    {
        return $this->hasMany('App\Models\Classes');
    }
}
