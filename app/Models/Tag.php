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

    public $timestamps = false;

    /**
    * get all titles for a cd
    * @return array Title
    */
    public function titles()
    {
        return $this->belongsToMany('App\Models\Cd');
    }
}
