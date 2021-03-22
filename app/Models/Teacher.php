<?php

namespace App\Models;

use App\Models\BaseModel;

class Teacher extends BaseModel
{
    public function classes()
    {
        return $this->hasMany('App\Models\Classes');
    }
}
