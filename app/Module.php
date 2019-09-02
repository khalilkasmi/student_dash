<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function classes(){
        return $this->hasMany(Classroom::class);
    }
}
