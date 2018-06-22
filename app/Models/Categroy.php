<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categroy extends Model
{
    protected $fillable = [
        'name', 'parent_id', 'type', 'images', 'keyword', 'content'
    ];

    public function attributes()
    {
        return $this->hasMany('App\Models\Attribute');
    }

    public function unattribute()
    {
        return $this->attributes()->delete();
    }

    public function attribute()
    {
        return $this->hasOne('App\Models\Attribute','id','type');
    }

    public function categroy()
    {
        return $this->belongsTo('App\Models\Categroy')->withDefault();
    }

    public function articles()
    {
        return $this->hasMany('App\Models\article');
    }



}
