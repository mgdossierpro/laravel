<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Cd extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'description'
    ];

    // getters and setters

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] =strtolower($value);
    }

    protected function setDescriptionAttribute($value)
    {
        $this->attributes['description'] =strtolower($value);
    }

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    protected function getDescriptionAttribute($value)
    {
        return strtoupper($value);
    }

    public $timestamps = false;

    /**
    * get all titles for a cd
    */
    public function titles()
    {
        return $this->hasMany('App\Models\Title');
    }

    /**
    * get all tags for a cd
    */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

}
