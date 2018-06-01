<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categroy extends Model
{
    protected $fillable = [
        'name','parent_id','type','images','keyword','content'
    ];
}
