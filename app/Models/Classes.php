<?php

namespace App\Models;

use App\Models\BaseModel;

class Classes extends BaseModel
{
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
}
