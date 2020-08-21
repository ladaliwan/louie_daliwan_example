<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    protected $guarded = [];


    public function users()
    {
        return $this->belongsTo(User::class, 'access_level_id');
    }
}
