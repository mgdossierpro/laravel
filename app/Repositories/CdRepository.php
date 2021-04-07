<?php

namespace App\Repositories;

use App\Models\Cd;

class CdRepository extends BaseRepository
{
    public function __construct(Cd $model)
    {
        parent::__construct($model);
    }

    public function getAllPaginate()
    {
        return Cd::paginate(2);
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
