<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function module(){
        return $this->belongsTo(Module::class);
    }
}
