<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\Session\Store;

class CdsController extends Controller
{
    /**
     *  Create an instance and return a list of cds 
     */
    public function getIndex()
    {
        $cd = new Cd(); 
        $cds = $cd->getCds();
        return view('cds.cds', ['cds'=>$cds]);
    }

        /**
     *  Create an instance and return a list of cds 
     */
    public function getDetails($id)
    {
        $cd = new Cd(); 
        $cd= $cd->getCd($id);
        return view('cds.cddetails', ['cd'=>$cd]);
    }
}
