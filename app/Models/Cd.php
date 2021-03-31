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
        'description',
        'tag_id'
    ];

    public $timestamps = false;

    /**
    * get all titles for a cd
    * @return array Title
    */
    public function titles()
    {
        return $this->hasMany('App\Models\Title');
    }

    /**
    * get all tags for a cd
    * @return array Tag
    */
    public function tags()
    {
        return $this->hasMany('App\Models\Tags');
    }


    /**
    * get all cds
    * @return array Cd
    */
    public function getCds(){
        return Cd::orderBy('title','asc')->get();
    }

    /**
    **  Retourne un cd
    * @param integer $id
    * @return Cd
    */
    public function getCd($id){

      return Cd::find($id);
    }

    /**
    * Créer un cd
    * @param Cd
    * @return bool
    */
    public function create(Cd $cd){
       $saved =  $cd->save();
       return $saved;
    }

    /**
    * Modfier un cd
    * @param Cd $cd
    * @return bool $updated
    */
    public function updateCd($id,$title,$description)
    {
        //get from db first
        $cd = Cd::find($id);
        // set new attributes
        $cd->title = $title;
        $cd->description = $description;
        $updated = $cd->save();
        return $updated;
    }

    /**
    *    Supprimer un cd
    * @param integer $id
    * @return bool $deleted
    */
    public function deleteCd($id)
    {
        $cd = Cd::find($id);
        $deleted = $cd->delete();
        return $deleted;
    }
}
