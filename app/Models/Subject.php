<?php

namespace App\Models;

use App\Models\BaseModel;

class Subject extends BaseModel
{
    public function classes()
    {
        return $this->belongsTo('App\Models\Classes');
    }
}
