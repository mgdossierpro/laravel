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


    public $timestamps = false;

    public function Cd()
    {
        return $this->belongsTo('App\Models\Cd', 'cd_id');
    }
}
