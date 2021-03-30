<?php

namespace App\Http\Controllers;

use App\Cd;
use Illuminate\Session\Store;

class CdsController extends Controller
{
    /**
     *  Create an instance and return a list of cds 
     */
    public function getIndex(Store $session)
    {
        $cd = new Cd(); 
        $cds = $cd->getCds($session);
        return view('cds.cds', ['cds'=>$cds]);
    }
}
