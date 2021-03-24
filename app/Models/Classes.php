<?php

namespace App\Models;

use App\Models\BaseModel;

class Classes extends BaseModel
{
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function subject()
    {
        return $this->hasMany('App\Models\Subject');
    }
}
