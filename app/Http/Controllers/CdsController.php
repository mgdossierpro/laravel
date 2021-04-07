<?php

namespace App\Http\Controllers;

use App\Repositories\CdRepository;


class CdsController extends Controller
{
    /**
     * The cd repository implementation.
     *
     * @var CdRepository $cdRepository
     */
    protected $cdRepository;

    public function __construct(CdRepository $cdRepository)
    {
        $this->cdRepository = $cdRepository;
    }

    /**
     *  Create an instance and return a list of cds
     */
    public function getIndex()
    {
       $cds = $this->cdRepository->getAllPaginate();
       return view('cds.cds', ['cds'=>$cds]);
    }

     /**
     *  Create an instance and return a list of cds
     */
    public function getDetails($id)
    {
        $cd =  $this->cdRepository->getById($id);
       
        return view('cds.cddetails', ['cd'=>$cd]);
    }
}
