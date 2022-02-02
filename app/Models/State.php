<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';
    protected $fillable = ['name', 'country_id'];

    public function city()
    {
        $this->hasMany('App\Models\City', 'state_id');
    }
}
