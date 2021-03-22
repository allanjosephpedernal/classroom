<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
