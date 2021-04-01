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

        return $this->belongsToMany('App\Models\Tag','cd_tag', 'tag_id','cd_id');
    }


    /**
    * Get all cds
    * @return array Cd
     * NOTE : u can use ->get Or paginate
    */
    public function getCds(){
        return Cd::orderBy('title','asc')->paginate(1);
    }

    /**
    * Retourne un cd
    * @param integer $id
    * @return Cd
    */
    public function getCd($id){
        // exemple eager loading ( chargement des sub ressources)
      return Cd::where('id',$id)->with('titles')->first();
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
    * Supprimer un cd
    * @param integer $id
    * @return bool $deleted
    */
    public function deleteCd($id)
    {
        $cd = Cd::find($id);
        // supprimer les titres du cd supprimé
        $cd->titles()->delete();
        // detache tous les tags du cd supprimé
        $cd->tags()->detach();
        $deleted = $cd->delete();
        return $deleted;
    }
}
