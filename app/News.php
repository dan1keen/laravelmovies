<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function authors(){
        return $this->belongsTo(Authors::class);
    }
}
