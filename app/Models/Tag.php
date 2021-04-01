<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Tag extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];

    // getters and setters

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public $timestamps = false;

    /**
    * get all titles for a cd
    * @return array Title
    */
    public function cds()
    {
        return $this->belongsToMany('App\Models\Cd', 'cd_tag', 'tag_id','cd_id');
    }
}
