<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    public function news(){
        return $this->hasMany(News::class);
    }
}
