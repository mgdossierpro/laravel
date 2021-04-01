<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'duration',
    ];

    // getters and setters

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =strtolower($value);
    }

    protected function setDurationAttribute($value)
    {
        $this->attributes['duration'] =strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getDurationAttribute($value)
    {
        return strtoupper($value);
    }

    public $timestamps = false;

    public function Cd()
    {
        return $this->belongsTo('App\Models\Cd', 'cd_id');
    }
}
