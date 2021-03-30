<?php

namespace App;

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

}
