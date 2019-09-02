<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'level_name',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function modules(){
        return $this->hasMany(Module::class);
    }
}
