<?php

namespace App\Models;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
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
        'description',
    ];

    /**
    * get all titles for a cd
    * @return array Title
    */
    public function titles()
    {
        return $this->hasMany('App\Models\Title');
    }

    /**
    * get all cds
    * @return array Cd
    */
    public function getCds(){
        return Cd::all();
    }


    /**
    **  Retourne le detail sur un cd
    * @param integer $id
    * @return Cd
    */
    public function getCd($id){

      return Cd::find($id);
    }

    /**
    * Créer un cd
    * @param Cd
    * @return integer
    */
    public function create(Cd $cd){
        dump($cd);
       $returnedId =  $cd->save();
       dump($returnedId);
       return $returnedId;
    }

    /*
        Modfier un cd
    */
    public function updateCd(Cd $cd)
    {
        $cd->save();
    }

    /*
        Supprimer un cd
    */
    public function deleteCd($id)
    {
        $cd = Cd::find($id);
        $cd->delete();
    }
}
