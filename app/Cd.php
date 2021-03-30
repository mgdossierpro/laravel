<?php

namespace App;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

Class Cd{

    /*
        Vérifier s'il existe des cds dans la session et retourne une liste de cds si non
    */
    public function getCds($session){
        if(!$session->has('cds')){
            $this->createDatas($session);
        }
        return $session->get('cds');
    }

    /*
       Retourne le detail sur un cd 
    */
    public function getCd(Store $session, $id){
 
      return view('cds.cddetails');
    }

    /*
        Cree des datas si la session n'en a pas
    */
    private function createDatas($session)
    {
        $cds  = [
            ['id'=>1,'title'=>'titre du cd ','description'=>'description du cd '],
            ['id'=>2, 'title'=>'titre du cd 2','description'=>'description du cd 2 ']
            ];

        $session->put('cds', $cds);
    }



    /*
        Modfier un cd
    */
    private function updateCd($session, $id, $title, $description)
    {
       
    }

    /*
        Supprimer un cd
    */
    private function deleteCd($session, $id, $title, $description)
    {
     
    }
}
