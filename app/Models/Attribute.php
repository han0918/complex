<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function categroys()
    {
        return $this->hasMany('App\Models\Categroy','type','id');
    }



}
